<?php

namespace PPP\DataModel\Deserializers;

use DataValues\StringValue;
use PPP\DataModel\MissingNode;
use PPP\DataModel\TripleNode;

/**
 * @covers PPP\DataModel\Deserializers\MissingNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class MissingNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new MissingNodeDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'missing'
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
				new MissingNode(),
				array(
					'type' => 'missing'
				)
			)
		);
	}
}
