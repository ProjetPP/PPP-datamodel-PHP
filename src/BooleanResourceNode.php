<?php

namespace PPP\DataModel;

use InvalidArgumentException;

/**
 * A boolean resource node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class BooleanResourceNode extends ResourceNode {

	/**
	 * @var bool
	 */
	private $booleanValue;

	/**
	 * @param string $value
	 */
	public function __construct($value) {
		$this->booleanValue = filter_var($value, FILTER_VALIDATE_BOOLEAN,  	FILTER_NULL_ON_FAILURE);

		if($this->booleanValue === null) {
			throw new InvalidArgumentException("Invalid value for BooleanResourceNode");
		}

		parent::__construct($value);
	}

	/**
	 * @return bool
	 */
	public function getBooleanValue() {
		return $this->booleanValue;
	}

	/**
	 * @return string
	 */
	public function getValueType() {
		return 'boolean';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self &&
		$this->booleanValue === $target->booleanValue;
	}
}
