<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\AbstractNode;
use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\LastNode;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class LastNodeDeserializer extends AbstractReducerNodeDeserializer {

	/**
	 * @param DeserializerFactory $deserializerFactory
	 */
	public function __construct(DeserializerFactory $deserializerFactory) {
		parent::__construct($deserializerFactory, 'last');
	}


	protected function getDeserialization(AbstractNode $list) {
		return new LastNode($list);
	}
}
