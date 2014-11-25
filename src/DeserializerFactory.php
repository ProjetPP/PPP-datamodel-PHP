<?php

namespace PPP\DataModel;

use Deserializers\Deserializer;
use Deserializers\DispatchingDeserializer;
use PPP\DataModel\Deserializers\BooleanResourceNodeDeserializer;
use PPP\DataModel\Deserializers\MissingNodeDeserializer;
use PPP\DataModel\Deserializers\ResourceListNodeDeserializer;
use PPP\DataModel\Deserializers\SentenceNodeDeserializer;
use PPP\DataModel\Deserializers\StringResourceNodeDeserializer;
use PPP\DataModel\Deserializers\TimeResourceNodeDeserializer;
use PPP\DataModel\Deserializers\TripleNodeDeserializer;
use PPP\DataModel\Deserializers\UnionNodeDeserializer;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class DeserializerFactory {

	/**
	 * @var Deserializer
	 */
	private $nodeDeserializer = null;

	/**
	 * @param Deserializer[] $customNodesDeserializers
	 */
	public function __construct(array $customNodesDeserializers = array()) {
		$this->nodeDeserializer = $this->buildNodeDeserializer($customNodesDeserializers);
	}

	private function buildNodeDeserializer(array $customNodesDeserializers) {
		$resourceNodeDeserializer = $this->buildResourceNodeDeserializer($customNodesDeserializers);
		return new DispatchingDeserializer(array(
			new MissingNodeDeserializer(),
			new TripleNodeDeserializer($this),
			new UnionNodeDeserializer($this),
			new SentenceNodeDeserializer(),
			new ResourceListNodeDeserializer($resourceNodeDeserializer),
			$resourceNodeDeserializer
		));
	}

	private function buildResourceNodeDeserializer(array $customNodesDeserializers) {
		return new DispatchingDeserializer(
			array_merge(
				$customNodesDeserializers,
				array(
					new BooleanResourceNodeDeserializer(),
					new StringResourceNodeDeserializer(),
					new TimeResourceNodeDeserializer()
				)
			)
		);
	}

	/**
	 * @return Deserializer
	 */
	public function newNodeDeserializer() {
		return $this->nodeDeserializer;
	}
}
