<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\StringResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class StringResourceNodeDeserializer extends AbstractResourceNodeDeserializer {

	public function __construct() {
		parent::__construct('string');
	}

	protected function getDeserialization($value, array $serialization) {
		$languageCode = array_key_exists('language', $serialization) ? $serialization['language'] : '';

		return new StringResourceNode($value, $languageCode);
	}
}
