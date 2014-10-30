<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\SentenceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SentenceNodeDeserializer extends TypedObjectDeserializer {

	public function __construct() {
		parent::__construct('sentence', 'type');
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

		return new SentenceNode($serialization['value']);
	}
}
