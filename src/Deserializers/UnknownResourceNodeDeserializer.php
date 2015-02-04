<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\UnknownResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnknownResourceNodeDeserializer extends TypedObjectDeserializer {

	public function __construct() {
		parent::__construct('resource', 'type');
	}

	/**
	 * @see Deserializer::deserialize
	 */
	public function deserialize($serialization) {
		$this->assertCanDeserialize($serialization);
		$this->requireAttributes($serialization, 'value');
		$this->assertAttributeInternalType($serialization, 'value', 'string');

		return new UnknownResourceNode($serialization['value'], $serialization);
	}
}
