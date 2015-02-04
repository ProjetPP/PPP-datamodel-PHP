<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\TypedObjectDeserializer;
use PPP\DataModel\UnknownResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnknownResourceNodeDeserializer extends AbstractResourceNodeDeserializer {

	public function __construct() {
		parent::__construct('unknown');
	}

	/**
	 * @see DispatchableDeserializer::isDeserializerFor
	 */
	public function isDeserializerFor($serialization) {
		return TypedObjectDeserializer::isDeserializerFor($serialization);
	}

	/**
	 * @see TypedObjectDeserializer::assertCanDeserialize
	 */
	protected function assertCanDeserialize($serialization) {
		TypedObjectDeserializer::assertCanDeserialize($serialization);
	}

	protected function getDeserialization($value, array $serialization) {
		return new UnknownResourceNode($value, $serialization);
	}
}
