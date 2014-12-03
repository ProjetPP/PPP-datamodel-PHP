<?php

namespace PPP\DataModel\Serializers;

use GeoJson\Geometry\Point;
use PPP\DataModel\BooleanResourceNode;
use PPP\DataModel\MissingNode;
use PPP\DataModel\GeoJsonResourceNode;

/**
 * @covers PPP\DataModel\Serializers\GeoJsonResourceNodeSerializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class GeoJsonResourceNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new GeoJsonResourceNodeSerializer();
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new GeoJsonResourceNode('1, 1', new Point(array(1, 1)))
			)
		);
	}

	/**
	 * @see SerializerBaseTest::nonSerializableProvider
	 */
	public function nonSerializableProvider() {
		return array(
			array(
				42
			),
			array(
				new MissingNode()
			),
			array(
				new BooleanResourceNode('true')
			)
		);
	}

	/**
	 * @see SerializerBaseTest::serializationProvider
	 */
	public function serializationProvider() {
		return array(
			array(
				array(
					'type' => 'resource',
					'value' => '1, 1',
					'value-type' => 'geo-json',
					'geojson' => array(
						'type' => 'Point',
						'coordinates' => array(1, 1)
					)
				),
				new GeoJsonResourceNode('1, 1', new Point(array(1, 1)))
			),
		);
	}
}
