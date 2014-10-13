<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\ResourceNode;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceNodeSerializer implements DispatchableSerializer {

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor($object) {
		return is_object($object) && $object instanceof ResourceNode;
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
			'value' => $node->getValue()
		);
	}
}