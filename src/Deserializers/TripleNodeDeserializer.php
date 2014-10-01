<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\Deserializer;
use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\TripleNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNodeDeserializer extends TypedObjectDeserializer {

	/**
	 * @var Deserializer
	 */
	private $nodeDeserializer;

	/**
	 * @param DeserializerFactory $deserializerFactory
	 */
	public function __construct(DeserializerFactory $deserializerFactory) {
		$this->nodeDeserializer = $deserializerFactory->newNodeDeserializer();

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
			$this->nodeDeserializer->deserialize($serialization['subject']),
			$this->nodeDeserializer->deserialize($serialization['predicate']),
			$this->nodeDeserializer->deserialize($serialization['object'])
		);
	}
}
