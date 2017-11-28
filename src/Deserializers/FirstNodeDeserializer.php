<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\AbstractNode;
use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\FirstNode;

/**
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class FirstNodeDeserializer extends AbstractReducerNodeDeserializer {

	/**
	 * @param DeserializerFactory $deserializerFactory
	 */
	public function __construct(DeserializerFactory $deserializerFactory) {
		parent::__construct($deserializerFactory, 'first');
	}


	protected function getDeserialization(AbstractNode $list) {
		return new FirstNode($list);
	}
}
