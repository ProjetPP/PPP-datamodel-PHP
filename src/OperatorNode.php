<?php

namespace PPP\DataModel;

/**
 * An operator node.
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
abstract class OperatorNode extends AbstractNode {

	/**
	 * @var AbstractNode[]
	 */
	private $operands;

	/**
	 * @param AbstractNode[] $operands
	 */
	public function __construct($operands) {
		$this->operands = $operands;
	}

	/**
	 * @return AbstractNode[]
	 */
	public function getOperands() {
		return $this->operands;
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		if(!($target instanceof self) || count($this->operands) !== count($target->operands)) {
			return false;
		}

		foreach($this->operands as $operand1) {
			$matched = false;
			foreach($this->operands as $operand2) {
				if($operand1->equals($operand2)) {
					$matched = true;
					break;
				}
			}
			if(!$matched) {
				return false;
			}
		}

		return true;
	}
}
