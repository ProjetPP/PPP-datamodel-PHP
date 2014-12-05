<?php

namespace PPP\DataModel;

class LastNode extends ReducerNode {

	/**
	 * @see AbstractNode::getType
	 */
	public function getType() {
		return 'last';
	}
}