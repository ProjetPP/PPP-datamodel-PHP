<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\SerializerFactory;
use PPP\DataModel\SortNode;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;
use Serializers\Serializer;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SortNodeSerializer implements DispatchableSerializer {

	/**
	 * @var SerializerFactory
	 */
	private $serializerFactory;

	/**
	 * @var Serializer
	 */
	private $resourceSerializer;

	/**
	 * @param SerializerFactory $serializerFactory
	 */
	public function __construct(SerializerFactory $serializerFactory, Serializer $resourceSerializer) {
		$this->serializerFactory = $serializerFactory;
		$this->resourceSerializer = $resourceSerializer;
	}
	
	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor($object) {
		return is_object($object) && $object instanceof SortNode;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize($object) {
		if(!$this->isSerializerFor($object)) {
			throw new UnsupportedObjectException($object, 'SortNodeSerializer can only serialize SortNode objects.');
		}

		return $this->getSerialization($object);
	}

	private function getSerialization(SortNode $node) {
		$nodeSerializer = $this->serializerFactory->newNodeSerializer();
		return array(
			'type' => 'sort',
			'list' => $nodeSerializer->serialize($node->getOperand()),
			'predicate' => $this->resourceSerializer->serialize($node->getPredicate())
		);
	}
}
