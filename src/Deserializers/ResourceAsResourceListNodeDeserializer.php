<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\Deserializer;
use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\ResourceListNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceAsResourceListNodeDeserializer extends TypedObjectDeserializer {

	/**
	 * @var Deserializer
	 */
	private $resourceDeserializer;

	/**
	 * @param Deserializer $resourceDeserializer
	 */
	public function __construct(Deserializer $resourceDeserializer) {
		$this->resourceDeserializer = $resourceDeserializer;

		parent::__construct('resource', 'type');
	}

	/**
	 * @see Deserializer::deserialize
	 */
	public function deserialize($serialization) {
		$this->assertCanDeserialize($serialization);

		return $this->getDeserialization($serialization);
	}

	private function getDeserialization(array $serialization) {
		return new ResourceListNode(array($this->resourceDeserializer->deserialize($serialization)));
	}
}
