<?php

namespace PPP\DataModel;

/**
 * @licence AGPLv3+
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
