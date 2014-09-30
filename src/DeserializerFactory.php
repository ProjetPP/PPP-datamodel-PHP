<?php

namespace PPP\DataModel;

use Deserializers\Deserializer;
use Deserializers\DispatchingDeserializer;
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
			new TripleNodeDeserializer()
		));
	}
}
