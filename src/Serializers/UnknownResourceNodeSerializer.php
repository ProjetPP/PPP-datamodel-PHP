<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\ResourceNode;
use PPP\DataModel\UnknownResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnknownResourceNodeSerializer extends BasicResourceNodeSerializer {

	public function __construct() {
		parent::__construct('unknown');
	}

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor($object) {
		return is_object($object) && $object instanceof UnknownResourceNode;
	}

	/**
	 * @see AbstractResourceNodeSerializer::getAdditionalSerialization
	 * @param UnknownResourceNode $node
	 */
	protected function getAdditionalSerialization(ResourceNode $node) {
		return $node->getAdditionalProperties();
	}
}
