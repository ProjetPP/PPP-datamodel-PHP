<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\SerializerFactory;
use PPP\DataModel\TripleNode;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;
use Serializers\Serializer;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNodeSerializer implements DispatchableSerializer {

	/**
	 * @var Serializer
	 */
	private $nodeSerializer;

	/**
	 * @param SerializerFactory $deserializerFactory
	 */
	public function __construct(SerializerFactory $deserializerFactory) {
		$this->nodeSerializer = $deserializerFactory->newNodeSerializer();
	}

	
	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor($object) {
		return is_object($object) && $object instanceof TripleNode;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize($object) {
		if(!$this->isSerializerFor($object)) {
			throw new UnsupportedObjectException($object, 'TripleNodeSerializer can only serialize TripleNode objects.');
		}

		return $this->getSerialization($object);
	}

	private function getSerialization(TripleNode $node) {
		return array(
			'type' => 'triple',
			'subject' => $this->nodeSerializer->serialize($node->getSubject()),
			'predicate' => $this->nodeSerializer->serialize($node->getPredicate()),
			'object' => $this->nodeSerializer->serialize($node->getObject())
		);
	}
}