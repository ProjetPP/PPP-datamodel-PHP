<?php

namespace PPP\DataModel\Deserializers;

use DataValues\BooleanValue;
use DataValues\NumberValue;
use DataValues\StringValue;
use DataValues\UnknownValue;

/**
 * @covers PPP\DataModel\Deserializers\SimpleDataValueDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SimpleDataValueDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new SimpleDataValueDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				true
			),
			array(
				42
			),
			array(
				'test'
			),
			array(
				null
			)
		);
	}

	/**
	 * @see DeserializerBaseTest::nonDeserializableProvider
	 */
	public function nonDeserializableProvider() {
		return array(
			array(
				array()
			),
			array(
				new StringValue('')
			)
		);
	}

	/**
	 * @see DeserializerBaseTest::deserializationProvider
	 */
	public function deserializationProvider() {
		return array(
			array(
				new BooleanValue(true),
				true
			),
			array(
				new NumberValue(42),
				42
			),
			array(
				new NumberValue(4.2),
				4.2
			),
			array(
				new StringValue('foo'),
				'foo'
			),
			array(
				new UnknownValue(null),
				null
			)
		);
	}
}
