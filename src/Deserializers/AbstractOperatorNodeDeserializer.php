<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\AbstractNode;
use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\OperatorNode;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
abstract class AbstractOperatorNodeDeserializer extends TypedObjectDeserializer {

	/**
	 * @var DeserializerFactory
	 */
	private $deserializerFactory;

	/**
	 * @param DeserializerFactory $deserializerFactory
	 * @param string $type
	 */
	public function __construct(DeserializerFactory $deserializerFactory, $type) {
		$this->deserializerFactory = $deserializerFactory;

		parent::__construct($type, 'type');
	}

	/**
	 * @see Deserializer::deserialize
	 */
	public function deserialize($serialization) {
		$this->assertCanDeserialize($serialization);
		$this->requireAttribute($serialization, 'list');
		$this->assertAttributeIsArray($serialization, 'list');
		$nodeDeserializer = $this->deserializerFactory->newNodeDeserializer();

		$list = array();
		foreach($serialization['list'] as $resourceSerialization) {
			$list[] = $nodeDeserializer->deserialize($resourceSerialization);
		}

		return $this->getDeserialization($list);
	}

	/**
	 * @param AbstractNode[] $list
	 * @return OperatorNode
	 */
	protected abstract function getDeserialization(array $list);
}
