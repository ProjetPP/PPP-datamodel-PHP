<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\ResourceNode;
use PPP\DataModel\TimeResourceNode;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class TimeResourceNodeSerializer extends BasicResourceNodeSerializer {

	public function __construct() {
		parent::__construct('time');
	}

	/**
	 * @see AbstractResourceNodeSerializer::getAdditionalSerialization
	 * @param TimeResourceNode $node
	 */
	protected function getAdditionalSerialization(ResourceNode $node) {
		return array(
			'calendar' => $node->getCalendar()
		);
	}
}
