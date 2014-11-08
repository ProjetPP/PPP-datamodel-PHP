<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\ResourceNode;
use PPP\DataModel\StringResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class StringResourceNodeSerializer extends BasicResourceNodeSerializer {

	public function __construct() {
		parent::__construct('string');
	}

	/**
	 * @see AbstractResourceNodeSerializer::getAdditionalSerialization
	 * @param StringResourceNode $node
	 */
	protected function getAdditionalSerialization(ResourceNode $node) {
		$serialization = array();

		if($node->getLanguageCode() !== '') {
			$serialization['language'] = $node->getLanguageCode();
		}

		return $serialization;
	}
}
