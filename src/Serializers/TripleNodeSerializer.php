<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\SerializerFactory;
use PPP\DataModel\TripleNode;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class TripleNodeSerializer implements DispatchableSerializer {

	/**
	 * @var SerializerFactory
	 */
	private $serializerFactory;

	/**
	 * @param SerializerFactory $serializerFactory
	 */
	public function __construct(SerializerFactory $serializerFactory) {
		$this->serializerFactory = $serializerFactory;
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
		$nodeSerializer = $this->serializerFactory->newNodeSerializer();
		return array(
			'type' => 'triple',
			'subject' => $nodeSerializer->serialize($node->getSubject()),
			'predicate' => $nodeSerializer->serialize($node->getPredicate()),
			'object' => $nodeSerializer->serialize($node->getObject())
		);
	}
}
