<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\Exceptions\UnsupportedTypeException;
use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\ResourceNode;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
abstract class AbstractResourceNodeDeserializer extends TypedObjectDeserializer {

	/**
	 * @var string
	 */
	private $valueType;

	/**
	 * @param string $valueType
	 */
	public function __construct($valueType) {
		$this->valueType = $valueType;

		parent::__construct('resource', 'type');
	}

	/**
	 * @see DispatchableDeserializer::isDeserializerFor
	 */
	public function isDeserializerFor($serialization) {
		return parent::isDeserializerFor($serialization) &&
			$this->getValueType($serialization) === $this->valueType;
	}

	/**
	 * @see TypedObjectDeserializer::assertCanDeserialize
	 */
	protected function assertCanDeserialize($serialization) {
		parent::assertCanDeserialize($serialization);

		if($this->getValueType($serialization) !== $this->valueType) {
			throw new UnsupportedTypeException($serialization['value-type']);
		}
	}

	/**
	 * @see Deserializer::deserialize
	 */
	public function deserialize($serialization) {
		$this->assertCanDeserialize($serialization);
		$this->requireAttributes($serialization, 'value');
		$this->assertAttributeInternalType($serialization, 'value', 'string');

		return $this->getDeserialization($serialization['value'], $serialization);
	}

	/**
	 * @param string $value
	 * @param array $serialization
	 * @return ResourceNode
	 */
	protected abstract function getDeserialization($value, array $serialization);

	private function getValueType(array $serialization) {
		if(array_key_exists('value-type', $serialization)) {
			$this->assertAttributeInternalType($serialization, 'value-type', 'string');
			return $serialization['value-type'];
		} else {
			return 'string';
		}
	}
}
