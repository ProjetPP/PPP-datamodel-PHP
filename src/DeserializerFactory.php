<?php

namespace PPP\DataModel;

use Deserializers\Deserializer;
use Deserializers\DispatchingDeserializer;
use PPP\DataModel\Deserializers\BooleanResourceNodeDeserializer;
use PPP\DataModel\Deserializers\MissingNodeDeserializer;
use PPP\DataModel\Deserializers\SentenceNodeDeserializer;
use PPP\DataModel\Deserializers\StringResourceNodeDeserializer;
use PPP\DataModel\Deserializers\TimeResourceNodeDeserializer;
use PPP\DataModel\Deserializers\TripleNodeDeserializer;

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
		return new DispatchingDeserializer(
			array_merge(
				$customNodesDeserializers,
				array(
					new MissingNodeDeserializer(),
					new TripleNodeDeserializer($this),
					new SentenceNodeDeserializer(),
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
