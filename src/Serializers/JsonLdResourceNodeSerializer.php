<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\ResourceNode;
use PPP\DataModel\JsonLdResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class JsonLdResourceNodeSerializer extends BasicResourceNodeSerializer {

	public function __construct() {
		parent::__construct('resource-jsonld');
	}

	/**
	 * @see AbstractResourceNodeSerializer::getAdditionalSerialization
	 * @param JsonLdResourceNode $node
	 */
	protected function getAdditionalSerialization(ResourceNode $node) {
		return array(
			'graph' => $node->getGraph()
		);
	}
}
