<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\TripleNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNodeDeserializer extends TypedObjectDeserializer {

	public function __construct() {
		parent::__construct('triple', 'type');
	}

	/**
	 * @see Deserializer::deserialize
	 */
	public function deserialize($serialization) {
		$this->assertCanDeserialize($serialization);

		return $this->getDeserialization($serialization);
	}

	private function getDeserialization(array $serialization) {
		$this->requireAttributes($serialization, 'subject', 'predicate', 'object');

		return new TripleNode(
			$serialization['subject'],
			$serialization['predicate'],
			$serialization['object']
		);
	}
}
