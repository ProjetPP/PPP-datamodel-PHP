<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\ResourceListNode;
use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;
use Serializers\Serializer;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceListNodeSerializer implements DispatchableSerializer {

	/**
	 * @var Serializer
	 */
	private $resourceSerializer;

	/**
	 * @param Serializer $resourceSerializer
	 */
	public function __construct(Serializer $resourceSerializer) {
		$this->resourceSerializer = $resourceSerializer;
	}
	
	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor($object) {
		return is_object($object) && $object instanceof ResourceListNode;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize($object) {
		if(!$this->isSerializerFor($object)) {
			throw new UnsupportedObjectException($object, 'ResourceListNodeSerializer can only serialize ResourceListNode objects.');
		}

		return $this->getSerialization($object);
	}

	private function getSerialization(ResourceListNode $node) {
		$list = array();

		foreach($node as $resource) {
			$list[] = $this->resourceSerializer->serialize($resource);
		}

		return array(
			'type' => 'list',
			'list' => $list
		);
	}
}
