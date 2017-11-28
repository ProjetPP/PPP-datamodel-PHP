<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\SentenceNode;

/**
 * @covers PPP\DataModel\Deserializers\SentenceNodeDeserializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class SentenceNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new SentenceNodeDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'sentence',
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
				new SentenceNode('foo'),
				array(
					'type' => 'sentence',
					'value' => 'foo'
				)
			)
		);
	}
}
