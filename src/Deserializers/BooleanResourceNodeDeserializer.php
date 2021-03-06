<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\BooleanResourceNode;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class BooleanResourceNodeDeserializer extends AbstractResourceNodeDeserializer {

	public function __construct() {
		parent::__construct('boolean');
	}

	protected function getDeserialization($value, array $serialization) {
		return new BooleanResourceNode($value);
	}
}
