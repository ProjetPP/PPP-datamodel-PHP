<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\UnknownResourceNode;

/**
 * @covers PPP\DataModel\Deserializers\UnknownResourceNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnknownResourceNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new UnknownResourceNodeDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'resource',
					'value' => 'Douglas Adams',
					'value-type' => 'ddd',
					'foo' => array('bar')
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
			)
		);
	}

	/**
	 * @see DeserializerBaseTest::deserializationProvider
	 */
	public function deserializationProvider() {
		return array(
			array(
				new UnknownResourceNode('Douglas Adams', array(
					'type' => 'resource',
					'value' => 'Douglas Adams',
					'value-type' => 'ddd',
					'foo' => array('bar')
				)),
				array(
					'type' => 'resource',
					'value' => 'Douglas Adams',
					'value-type' => 'ddd',
					'foo' => array('bar')
				)
			),
		);
	}
}
