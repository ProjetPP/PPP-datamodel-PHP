<?php

namespace PPP\DataModel;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class LastNode extends ReducerNode {

	/**
	 * @see AbstractNode::getType
	 */
	public function getType() {
		return 'last';
	}
}