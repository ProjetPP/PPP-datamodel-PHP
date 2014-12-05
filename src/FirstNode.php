<?php

namespace PPP\DataModel;

class FirstNode extends ReducerNode {

	/**
	 * @see AbstractNode::getType
	 */
	public function getType() {
		return 'first';
	}
}