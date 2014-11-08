<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\ResourceNode;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class BasicResourceNodeSerializer implements DispatchableSerializer {

	/**
	 * @var string
	 */
	private $valueType;

	/**
	 * @param $valueType
	 */
	public function __construct($valueType) {
		$this->valueType = $valueType;
	}

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor($object) {
		return is_object($object) && $object instanceof ResourceNode && $object->getValueType() === $this->valueType;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize($object) {
		if(!$this->isSerializerFor($object)) {
			throw new UnsupportedObjectException($object, 'ResourceNodeSerializer can only serialize ResourceNode objects.');
		}

		return $this->getSerialization($object);
	}

	private function getSerialization(ResourceNode $node) {
		return array(
			'type' => 'resource',
			'value' => $node->getValue(),
			'value-type' => $node->getValueType()
		) + $this->getAdditionalSerialization($node);
	}

	/**
	 * Should be use to add extra information to the serialization
	 * @param ResourceNode $node
	 * @return array
	 */
	protected function getAdditionalSerialization(ResourceNode $node) {
		return array();
	}
}
