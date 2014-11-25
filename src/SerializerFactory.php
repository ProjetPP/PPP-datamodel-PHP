<?php

namespace PPP\DataModel;

use PPP\DataModel\Serializers\BasicResourceNodeSerializer;
use PPP\DataModel\Serializers\MissingNodeSerializer;
use PPP\DataModel\Serializers\OperatorNodeSerializer;
use PPP\DataModel\Serializers\ResourceListNodeSerializer;
use PPP\DataModel\Serializers\SentenceNodeSerializer;
use PPP\DataModel\Serializers\StringResourceNodeSerializer;
use PPP\DataModel\Serializers\TimeResourceNodeSerializer;
use PPP\DataModel\Serializers\TripleNodeSerializer;
use Serializers\DispatchingSerializer;
use Serializers\Serializer;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SerializerFactory {

	/**
	 * @var Serializer
	 */
	private $nodeSerializer = null;

	/**
	 * @param Serializer[] $customNodesSerializers
	 */
	public function __construct(array $customNodesSerializers = array()) {
		$this->nodeSerializer = $this->buildNodeSerializer($customNodesSerializers);
	}

	private function buildNodeSerializer(array $customNodesSerializers) {
		$resourceNodeSerializer = $this->buildResourceNodeSerializer($customNodesSerializers);
		return new DispatchingSerializer(array(
			new MissingNodeSerializer(),
			new TripleNodeSerializer($this),
			new OperatorNodeSerializer($this),
			new SentenceNodeSerializer(),
			new ResourceListNodeSerializer($resourceNodeSerializer),
			$resourceNodeSerializer
		));
	}

	private function buildResourceNodeSerializer(array $customNodesSerializers) {
		return new DispatchingSerializer(
			array_merge(
				$customNodesSerializers,
				array(
					new BasicResourceNodeSerializer('boolean'),
					new StringResourceNodeSerializer(),
					new TimeResourceNodeSerializer()
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
