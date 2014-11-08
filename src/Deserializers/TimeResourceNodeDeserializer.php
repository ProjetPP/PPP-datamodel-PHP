<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\TimeResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TimeResourceNodeDeserializer extends AbstractResourceNodeDeserializer {

	public function __construct() {
		parent::__construct('time');
	}

	/**
	 * @see DispatchableDeserializer::getDeserialization
	 */
	protected function getDeserialization($value, array $serialization) {
		$calendar = array_key_exists('calendar', $serialization) ? $serialization['calendar'] : 'gregorian';

		return new TimeResourceNode($value, $calendar);
	}
}
