<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\ReducerNode;
use PPP\DataModel\SerializerFactory;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ReducerNodeSerializer implements DispatchableSerializer {

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
		return is_object($object) && $object instanceof ReducerNode;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize($object) {
		if(!$this->isSerializerFor($object)) {
			throw new UnsupportedObjectException($object, 'ReducerNodeSerializer can only serialize ReducerNode objects.');
		}

		return $this->getSerialization($object);
	}

	private function getSerialization(ReducerNode $node) {
		$nodeSerializer = $this->serializerFactory->newNodeSerializer();

		return array(
			'type' => $node->getType(),
			'list' => $nodeSerializer->serialize($node->getOperand())
		);
	}
}
