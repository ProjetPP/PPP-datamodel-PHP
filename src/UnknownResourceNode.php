<?php

namespace PPP\DataModel;

/**
 * A JSON-LD resource node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnknownResourceNode extends ResourceNode {

	/**
	 * @var array
	 */
	private $properties;

	/**
	 * @param string $value
	 * @param array $additionalProperties
	 */
	public function __construct($value, array $additionalProperties) {
		$this->properties = $additionalProperties;

		parent::__construct($value);
	}

	public function getProperties() {
		return $this->properties;
	}

	/**
	 * @return string
	 */
	public function getValueType() {
		return array_key_exists( 'value-type', $this->properties )
			? $this->properties['value-type']
			: 'unknown';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self && $this->properties == $target->properties;
	}
}
