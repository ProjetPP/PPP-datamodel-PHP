<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\AbstractNode;
use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\ReducerNode;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
abstract class AbstractReducerNodeDeserializer extends TypedObjectDeserializer {

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
		$nodeDeserializer = $this->deserializerFactory->newNodeDeserializer();

		return $this->getDeserialization($nodeDeserializer->deserialize($serialization['list']));
	}

	/**
	 * @param AbstractNode $list
	 * @return ReducerNode
	 */
	protected abstract function getDeserialization(AbstractNode $list);
}
