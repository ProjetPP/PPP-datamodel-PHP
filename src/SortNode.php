<?php

namespace PPP\DataModel;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SortNode extends AbstractNode {

	/**
	 * @var AbstractNode
	 */
	private $operand;

	/**
	 * @var ResourceNode
	 */
	private $predicate;

	/**
	 * @param AbstractNode $operand
	 * @param ResourceNode $predicate
	 */
	public function __construct(AbstractNode $operand, ResourceNode $predicate) {
		$this->operand = $operand;
		$this->predicate = $predicate;
	}

	/**
	 * @return AbstractNode
	 */
	public function getOperand() {
		return $this->operand;
	}

	/**
	 * @return ResourceNode
	 */
	public function getPredicate() {
		return $this->predicate;
	}

	/**
	 * @see AbstractNode::getType
	 */
	public function getType() {
		return 'sort';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self &&
			$this->operand->equals($target->operand) &&
			$this->predicate->equals($target->predicate);
	}
}
