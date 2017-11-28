<?php

namespace PPP\DataModel;

/**
 * A sentence node.
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class SentenceNode extends AbstractNode {

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
		return 'sentence';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self &&
			$this->value === $target->value;
	}
}
