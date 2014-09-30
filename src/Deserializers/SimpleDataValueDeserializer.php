<?php

namespace PPP\DataModel\Deserializers;

use DataValues\BooleanValue;
use DataValues\NumberValue;
use DataValues\StringValue;
use DataValues\UnknownValue;
use Deserializers\Deserializer;
use Deserializers\Exceptions\DeserializationException;

/**
 * Deserialize simple types as string or int as DataValue objects
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SimpleDataValueDeserializer implements Deserializer {

	/**
	 * @see Deserializer::deserialize
	 */
	public function deserialize($serialization) {
		$type = gettype($serialization);
		switch($type) {
			case  'boolean':
				return new BooleanValue($serialization);
			case 'integer':
			case 'double':
				return new NumberValue($serialization);
			case 'string':
				return new StringValue($serialization);
			case 'NULL':
				return new UnknownValue(null);
			default:
				throw new DeserializationException("The type $type is not supported by the SimpleDataValueDeserializer");
		}
	}
}
