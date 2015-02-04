<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\UnknownResourceNode;
use Serializers\Exceptions\UnsupportedObjectException;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnknownResourceNodeSerializer extends BasicResourceNodeSerializer {

	public function __construct() {
		parent::__construct('resource', 'type');
	}

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor($object) {
		return is_object($object) && $object instanceof UnknownResourceNode;
	}

	/**
	 * @see Serializer::serialize
	 * @param UnknownResourceNode $object
	 */
	public function serialize($object) {
		if(!$this->isSerializerFor($object)) {
			throw new UnsupportedObjectException($object, 'UnkownResourceNodeSerializer can only serialize UnknownResourceNode objects.');
		}

		return $object->getProperties();
	}
}
