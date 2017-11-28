<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\MissingNode;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class MissingNodeDeserializer extends TypedObjectDeserializer {

	public function __construct() {
		parent::__construct('missing', 'type');
	}

	/**
	 * @see Deserializer::deserialize
	 */
	public function deserialize($serialization) {
		$this->assertCanDeserialize($serialization);

		return new MissingNode();
	}
}
