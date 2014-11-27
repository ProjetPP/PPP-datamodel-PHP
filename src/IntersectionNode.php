<?php

namespace PPP\DataModel;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class IntersectionNode extends OperatorNode {

	/**
	 * @return string
	 */
	public function getType() {
		return 'intersection';
	}
}
