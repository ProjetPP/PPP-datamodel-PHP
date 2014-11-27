<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\IntersectionNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class IntersectionNodeDeserializer extends AbstractOperatorNodeDeserializer {

	/**
	 * @param DeserializerFactory $deserializerFactory
	 */
	public function __construct(DeserializerFactory $deserializerFactory) {
		parent::__construct($deserializerFactory, 'intersection');
	}


	protected function getDeserialization(array $list) {
		return new IntersectionNode($list);
	}
}
