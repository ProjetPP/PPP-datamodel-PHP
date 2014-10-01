<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\ResourceNode;

/**
 * @covers PPP\DataModel\Deserializers\ResourceNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new ResourceNodeDeserializer();
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
				new ResourceNode('foo'),
				array(
					'type' => 'resource',
					'value' => 'foo'
				)
			)
		);
	}
}
