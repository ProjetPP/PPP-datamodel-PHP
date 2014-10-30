<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\SentenceNode;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SentenceNodeSerializer implements DispatchableSerializer {

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor($object) {
		return is_object($object) && $object instanceof SentenceNode;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize($object) {
		if(!$this->isSerializerFor($object)) {
			throw new UnsupportedObjectException($object, 'SentenceNodeSerializer can only serialize SentenceNode objects.');
		}

		return $this->getSerialization($object);
	}

	private function getSerialization(SentenceNode $node) {
		return array(
			'type' => 'sentence',
			'value' => $node->getValue()
		);
	}
}