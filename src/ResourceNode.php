<?php

namespace PPP\DataModel;

/**
 * A resource node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceNode extends AbstractNode {

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
	 * @see AbstractNode::getType
	 */
	public function getType() {
		return 'resource';
	}
}
