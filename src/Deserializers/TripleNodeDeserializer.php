<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\TripleNode;
use PPP\DataModel\UnionNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNodeDeserializer extends TypedObjectDeserializer {

	/**
	 * @var DeserializerFactory
	 */
	private $deserializerFactory;

	/**
	 * @param DeserializerFactory $deserializerFactory
	 */
	public function __construct(DeserializerFactory $deserializerFactory) {
		$this->deserializerFactory = $deserializerFactory;

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

		$nodeDeserializer = $this->deserializerFactory->newNodeDeserializer();
		$baseTriple = new TripleNode(
			$nodeDeserializer->deserialize($serialization['subject']),
			$nodeDeserializer->deserialize($serialization['predicate']),
			$nodeDeserializer->deserialize($serialization['object'])
		);

		if(!array_key_exists('inverse-predicate', $serialization)) {
			return $baseTriple;
		}

		return new UnionNode(array(
			$baseTriple,
			new TripleNode(
				$baseTriple->getObject(),
				$nodeDeserializer->deserialize($serialization['inverse-predicate']),
				$baseTriple->getSubject()
			)
		));
	}
}
