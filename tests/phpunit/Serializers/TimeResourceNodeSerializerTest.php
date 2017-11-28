<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\BooleanResourceNode;
use PPP\DataModel\MissingNode;
use PPP\DataModel\TimeResourceNode;

/**
 * @covers PPP\DataModel\Serializers\TimeResourceNodeSerializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class TimeResourceNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new TimeResourceNodeSerializer();
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new TimeResourceNode('1111-11-11')
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
					'value' => '1111-11-11',
					'value-type' => 'time',
					'calendar' => 'gregorian'
				),
				new TimeResourceNode('1111-11-11')
			),
			array(
				array(
					'type' => 'resource',
					'value' => '1111-11-11',
					'value-type' => 'time',
					'calendar' => 'julian'
				),
				new TimeResourceNode('1111-11-11', 'julian')
			),
		);
	}
}
