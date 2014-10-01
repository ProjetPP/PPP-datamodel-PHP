<?php

namespace PPP\DataModel;

use Deserializers\Deserializer;
use Deserializers\DispatchingDeserializer;
use PPP\DataModel\Deserializers\MissingNodeDeserializer;
use PPP\DataModel\Deserializers\SimpleDataValueDeserializer;
use PPP\DataModel\Deserializers\TripleNodeDeserializer;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class DeserializerFactory {

	/**
	 * @return Deserializer
	 */
	public function newNodeDeserializer() {
		return new DispatchingDeserializer(array(
			new MissingNodeDeserializer(),
			new TripleNodeDeserializer(new SimpleDataValueDeserializer())
		));
	}
}
