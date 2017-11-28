<?php

namespace PPP\DataModel;


/**
 * A reducer node e.g. an operator list -> resource
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
abstract class ReducerNode extends AbstractNode {

	/**
	 * @var AbstractNode
	 */
	private $operand;

	/**
	 * @param AbstractNode $operand
	 */
	public function __construct($operand) {
		$this->operand = $operand;
	}

	/**
	 * @return AbstractNode[]
	 */
	public function getOperand() {
		return $this->operand;
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self && $this->operand->equals($target->operand);
	}
}
