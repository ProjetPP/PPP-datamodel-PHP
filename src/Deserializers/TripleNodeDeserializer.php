<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\Deserializer;
use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\TripleNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNodeDeserializer extends TypedObjectDeserializer {

	/**
	 * @var Deserializer
	 */
	private $dataValueDeserializer;

	/**
	 * @param Deserializer $dataValueDeserializer
	 */
	public function __construct(Deserializer $dataValueDeserializer) {
		$this->dataValueDeserializer = $dataValueDeserializer;

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
			$this->dataValueDeserializer->deserialize($serialization['subject']),
			$this->dataValueDeserializer->deserialize($serialization['predicate']),
			$this->dataValueDeserializer->deserialize($serialization['object'])
		);
	}
}
