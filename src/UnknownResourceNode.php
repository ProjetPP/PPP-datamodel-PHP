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
	private $additionalProperties;

	/**
	 * @param string $value
	 * @param array $additionalProperties
	 */
	public function __construct($value, array $additionalProperties) {
		$this->additionalProperties = $additionalProperties;

		parent::__construct($value);
	}

	public function getAdditionalProperties() {
		return $this->additionalProperties;
	}

	/**
	 * @return string
	 */
	public function getValueType() {
		return array_key_exists( 'value-type', $this->additionalProperties )
			? $this->additionalProperties['value-type']
			: 'unknown';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self && $this->additionalProperties == $target->additionalProperties;
	}
}
