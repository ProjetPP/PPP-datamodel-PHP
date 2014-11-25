<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\OperatorNode;
use PPP\DataModel\SerializerFactory;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class OperatorNodeSerializer implements DispatchableSerializer {


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
		return is_object($object) && $object instanceof OperatorNode;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize($object) {
		if(!$this->isSerializerFor($object)) {
			throw new UnsupportedObjectException($object, 'OperatorNodeSerializer can only serialize OperatorNode objects.');
		}

		return $this->getSerialization($object);
	}

	private function getSerialization(OperatorNode $node) {
		$nodeSerializer = $this->serializerFactory->newNodeSerializer();
		$list = array();

		foreach($node->getOperands() as $resource) {
			$list[] = $nodeSerializer->serialize($resource);
		}

		return array(
			'type' => $node->getType(),
			'list' => $list
		);
	}
}
