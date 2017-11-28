<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\BooleanResourceNode;

/**
 * @covers PPP\DataModel\Deserializers\BooleanResourceNodeDeserializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class BooleanResourceNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new BooleanResourceNodeDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'resource',
					'value-type' => 'boolean',
					'value' => 'true'
				),
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
					'type' => 'true'
				)
			),
			array(
				array(
					'type' => 'true',
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
				new BooleanResourceNode('true'),
				array(
					'type' => 'resource',
					'value-type' => 'boolean',
					'value' => 'true'
				)
			),
		);
	}
}
