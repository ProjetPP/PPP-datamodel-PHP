<?php

namespace PPP\DataModel;

use PPP\DataModel\Serializers\BasicResourceNodeSerializer;
use PPP\DataModel\Serializers\JsonLdResourceNodeSerializer;
use PPP\DataModel\Serializers\MissingNodeSerializer;
use PPP\DataModel\Serializers\OperatorNodeSerializer;
use PPP\DataModel\Serializers\ReducerNodeSerializer;
use PPP\DataModel\Serializers\ResourceListNodeSerializer;
use PPP\DataModel\Serializers\SentenceNodeSerializer;
use PPP\DataModel\Serializers\SortNodeSerializer;
use PPP\DataModel\Serializers\StringResourceNodeSerializer;
use PPP\DataModel\Serializers\TimeResourceNodeSerializer;
use PPP\DataModel\Serializers\TripleNodeSerializer;
use PPP\DataModel\Serializers\UnknownResourceNodeSerializer;
use Serializers\DispatchingSerializer;
use Serializers\Serializer;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class SerializerFactory {

	/**
	 * @var Serializer
	 */
	private $nodeSerializer = null;

	/**
	 * @param Serializer[] $customResourceNodesSerializers
	 */
	public function __construct(array $customResourceNodesSerializers = array()) {
		$this->nodeSerializer = $this->buildNodeSerializer($customResourceNodesSerializers);
	}

	private function buildNodeSerializer(array $customResourceNodesSerializers) {
		$resourceNodeSerializer = $this->buildResourceNodeSerializer($customResourceNodesSerializers);
		return new DispatchingSerializer(array(
			new MissingNodeSerializer(),
			new TripleNodeSerializer($this),
			new OperatorNodeSerializer($this),
			new ReducerNodeSerializer($this),
			new SentenceNodeSerializer(),
			new SortNodeSerializer($this, $resourceNodeSerializer),
			new ResourceListNodeSerializer($resourceNodeSerializer)
		));
	}

	private function buildResourceNodeSerializer(array $customResourceNodesSerializers) {
		return new DispatchingSerializer(
			array_merge(
				$customResourceNodesSerializers,
				array(
					new BasicResourceNodeSerializer('boolean'),
					new StringResourceNodeSerializer(),
					new TimeResourceNodeSerializer(),
					new JsonLdResourceNodeSerializer(),
					new UnknownResourceNodeSerializer()
				)
			)
		);
	}

	/**
	 * @return Serializer
	 */
	public function newNodeSerializer() {
		return $this->nodeSerializer;
	}
}
