<?php

namespace PPP\DataModel;

use Deserializers\Deserializer;
use Deserializers\DispatchingDeserializer;
use PPP\DataModel\Deserializers\BooleanResourceNodeDeserializer;
use PPP\DataModel\Deserializers\FirstNodeDeserializer;
use PPP\DataModel\Deserializers\GeoJsonResourceNodeDeserializer;
use PPP\DataModel\Deserializers\IntersectionNodeDeserializer;
use PPP\DataModel\Deserializers\JsonLdResourceNodeDeserializer;
use PPP\DataModel\Deserializers\LastNodeDeserializer;
use PPP\DataModel\Deserializers\MissingNodeDeserializer;
use PPP\DataModel\Deserializers\ResourceAsResourceListNodeDeserializer;
use PPP\DataModel\Deserializers\ResourceListNodeDeserializer;
use PPP\DataModel\Deserializers\SentenceNodeDeserializer;
use PPP\DataModel\Deserializers\SortNodeDeserializer;
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
	 * @param Deserializer[] $customResourceNodesDeserializers
	 */
	public function __construct(array $customResourceNodesDeserializers = array()) {
		$this->nodeDeserializer = $this->buildNodeDeserializer($customResourceNodesDeserializers);
	}

	private function buildNodeDeserializer(array $customResourceNodesDeserializers) {
		$resourceNodeDeserializer = $this->buildResourceNodeDeserializer($customResourceNodesDeserializers);
		return new DispatchingDeserializer(array(
			new MissingNodeDeserializer(),
			new TripleNodeDeserializer($this),
			new UnionNodeDeserializer($this),
			new IntersectionNodeDeserializer($this),
			new FirstNodeDeserializer($this),
			new LastNodeDeserializer($this),
			new SentenceNodeDeserializer(),
			new SortNodeDeserializer($this, $resourceNodeDeserializer),
			new ResourceListNodeDeserializer($resourceNodeDeserializer),
			new ResourceAsResourceListNodeDeserializer($resourceNodeDeserializer)
		));
	}

	private function buildResourceNodeDeserializer(array $customResourceNodesDeserializers) {
		return new DispatchingDeserializer(
			array_merge(
				$customResourceNodesDeserializers,
				array(
					new BooleanResourceNodeDeserializer(),
					new StringResourceNodeDeserializer(),
					new TimeResourceNodeDeserializer(),
					new JsonLdResourceNodeDeserializer()
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
