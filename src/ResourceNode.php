<?php

namespace PPP\DataModel;

/**
 * A resource node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
abstract class ResourceNode {

	/**
	 * @var string
	 */
	private $value;

	/**
	 * @param string $value
	 */
	public function __construct($value) {
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @return string
	 */
	public abstract function getValueType();

	/**
	 * @return string
	 */
	public function getType() {
		return 'resource';
	}

	/**
	 * Returns if $target is equals to the current resource
	 *
	 * @param mixed $target
	 * @return boolean
	 */
	public abstract function equals($target);
}
