<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\MissingNode;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class MissingNodeSerializer implements DispatchableSerializer {

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor($object) {
		return is_object($object) && $object instanceof MissingNode;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize($object) {
		if(!$this->isSerializerFor($object)) {
			throw new UnsupportedObjectException($object, 'MissingNodeSerializer can only serialize MissingNode objects.');
		}

		return array(
			'type' => 'missing'
		);
	}
}
