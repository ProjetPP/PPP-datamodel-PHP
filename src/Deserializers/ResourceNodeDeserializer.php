<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\ResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceNodeDeserializer extends TypedObjectDeserializer {

	public function __construct() {
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
		$this->requireAttributes($serialization, 'value');
		$this->assertAttributeInternalType($serialization, 'value', 'string');

		return new ResourceNode($serialization['value']);
	}
}
