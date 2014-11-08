<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\ResourceNode;
use PPP\DataModel\TimeResourceNode;

/**
 * @covers PPP\DataModel\Deserializers\TimeResourceNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TimeResourceNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new TimeResourceNodeDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'resource',
					'value-type' => 'time',
					'value' => '1111-11-11'
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
				new TimeResourceNode('1111-11-11'),
				array(
					'type' => 'resource',
					'value-type' => 'time',
					'value' => '1111-11-11'
				)
			),
			array(
				new TimeResourceNode('1111-11-11', 'julian'),
				array(
					'type' => 'resource',
					'value-type' => 'time',
					'value' => '1111-11-11',
					'calendar' => 'julian'
				)
			)
		);
	}
}
