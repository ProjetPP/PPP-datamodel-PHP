<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\Deserializer;
use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\SortNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SortNodeDeserializer extends TypedObjectDeserializer {

	/**
	 * @var DeserializerFactory
	 */
	private $deserializerFactory;

	/**
	 * @var Deserializer
	 */
	private $resourceDeserializer;

	/**
	 * @param DeserializerFactory $deserializerFactory
	 * @param Deserializer $resourceDeserializer
	 */
	public function __construct(DeserializerFactory $deserializerFactory, Deserializer $resourceDeserializer) {
		$this->deserializerFactory = $deserializerFactory;
		$this->resourceDeserializer = $resourceDeserializer;

		parent::__construct('sort', 'type');
	}

	/**
	 * @see Deserializer::deserialize
	 */
	public function deserialize($serialization) {
		$this->assertCanDeserialize($serialization);

		return $this->getDeserialization($serialization);
	}

	private function getDeserialization(array $serialization) {
		$this->requireAttributes($serialization, 'list', 'predicate');

		$nodeDeserializer = $this->deserializerFactory->newNodeDeserializer();
		return new SortNode(
			$nodeDeserializer->deserialize($serialization['list']),
			$this->resourceDeserializer->deserialize($serialization['predicate'])
		);
	}
}
