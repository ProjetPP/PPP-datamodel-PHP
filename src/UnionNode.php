<?php

namespace PPP\DataModel;

/**
 * A union operator node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnionNode extends OperatorNode {

	/**
	 * @return string
	 */
	public function getType() {
		return 'union';
	}
}
