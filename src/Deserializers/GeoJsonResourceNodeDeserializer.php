<?php

namespace PPP\DataModel\Deserializers;

use Deserializers\Exceptions\DeserializationException;
use GeoJson\Exception\UnserializationException;
use GeoJson\GeoJson;
use PPP\DataModel\GeoJSonResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class GeoJSonResourceNodeDeserializer extends AbstractResourceNodeDeserializer {

	public function __construct() {
		parent::__construct('geo-json');
	}

	protected function getDeserialization($value, array $serialization) {
		$this->requireAttribute($serialization, 'geojson');

		try {
			$geoJson = GeoJson::jsonUnserialize($serialization['geojson']);
		} catch(UnserializationException $e) {
			throw new DeserializationException($e->getMessage(), $e);
		}

		return new GeoJSonResourceNode($value, $geoJson);
	}
}
