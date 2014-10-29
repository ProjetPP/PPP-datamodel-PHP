<?php

namespace PPP\DataModel;

/**
 * A missing node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class MissingNode extends AbstractNode {

	/**
	 * @see AbstractNode::getType
	 */
	public function getType() {
		return 'missing';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self;
	}
}
