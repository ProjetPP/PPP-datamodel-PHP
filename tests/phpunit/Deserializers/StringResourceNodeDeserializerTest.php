<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\StringResourceNode;

/**
 * @covers PPP\DataModel\Deserializers\StringResourceNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class StringResourceNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new StringResourceNodeDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'resource',
					'value' => 'foo'
				),
				array(
					'type' => 'resource',
					'value-type' => 'string',
					'value' => 'foo'
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
				new StringResourceNode('foo'),
				array(
					'type' => 'resource',
					'value-type' => 'string',
					'value' => 'foo'
				)
			),
			array(
				new StringResourceNode('foo', 'en'),
				array(
					'type' => 'resource',
					'value-type' => 'string',
					'value' => 'foo',
					'language' => 'en'
				)
			)
		);
	}
}
