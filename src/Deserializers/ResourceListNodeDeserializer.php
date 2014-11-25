<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\Deserializer;
use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\ResourceListNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceListNodeDeserializer extends TypedObjectDeserializer {

	/**
	 * @var Deserializer
	 */
	private $resourceDeserializer;

	/**
	 * @param Deserializer $resourceDeserializer
	 */
	public function __construct(Deserializer $resourceDeserializer) {
		$this->resourceDeserializer = $resourceDeserializer;

		parent::__construct('list', 'type');
	}

	/**
	 * @see Deserializer::deserialize
	 */
	public function deserialize($serialization) {
		$this->assertCanDeserialize($serialization);

		return $this->getDeserialization($serialization);
	}

	private function getDeserialization(array $serialization) {
		$this->requireAttribute($serialization, 'list');
		$this->assertAttributeIsArray($serialization, 'list');

		$list = array();
		foreach($serialization['list'] as $resourceSerialization) {
			$list[] = $this->resourceDeserializer->deserialize($resourceSerialization);
		}

		return new ResourceListNode($list);
	}
}
