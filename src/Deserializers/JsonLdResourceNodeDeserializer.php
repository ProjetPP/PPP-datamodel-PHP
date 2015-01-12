<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\JsonLdResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class JsonLdResourceNodeDeserializer extends AbstractResourceNodeDeserializer {

	public function __construct() {
		parent::__construct('resource-jsonld');
	}

	protected function getDeserialization($value, array $serialization) {
		$this->requireAttribute($serialization, 'graph');

		return new JsonLdResourceNode($value, json_decode(json_encode($serialization['graph'])));
	}
}
