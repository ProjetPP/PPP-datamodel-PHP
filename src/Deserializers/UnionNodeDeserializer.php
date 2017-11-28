<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\UnionNode;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class UnionNodeDeserializer extends AbstractOperatorNodeDeserializer {

	/**
	 * @param DeserializerFactory $deserializerFactory
	 */
	public function __construct(DeserializerFactory $deserializerFactory) {
		parent::__construct($deserializerFactory, 'union');
	}


	protected function getDeserialization(array $list) {
		return new UnionNode($list);
	}
}
