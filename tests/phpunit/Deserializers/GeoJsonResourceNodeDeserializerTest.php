<?php

namespace PPP\DataModel\Deserializers;

use GeoJson\Geometry\Point;
use PPP\DataModel\GeoJsonResourceNode;

/**
 * @covers PPP\DataModel\Deserializers\GeoJsonResourceNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class GeoJsonResourceNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new GeoJsonResourceNodeDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'resource',
					'value-type' => 'geo-json',
					'value' => '1, 1',
					'geojson' => array(
						'type' => 'Point',
						'coordinates' => array(1, 1)
					)
				)
			)
		);
	}

	/**
	 * @see DeserializerBaseTest::nonDeserializableProvider
	 */
	public function nonDeserializableProvider() {
		return array(
			array(
				42
			),
			array(
				array(
					'type' => 'foo'
				)
			),
			array(
				array(
					'type' => 'resource',
					'value-type' => 'boolean',
					'value' => 'true'
				)
			)
		);
	}

	/**
	 * @see DeserializerBaseTest::deserializationProvider
	 */
	public function deserializationProvider() {
		return array(
			array(
				new GeoJsonResourceNode('1, 1', new Point(array(1, 1))),
				array(
					'type' => 'resource',
					'value-type' => 'geo-json',
					'value' => '1, 1',
					'geojson' => array(
						'type' => 'Point',
						'coordinates' => array(1, 1)
					)
				)
			),
		);
	}
}
