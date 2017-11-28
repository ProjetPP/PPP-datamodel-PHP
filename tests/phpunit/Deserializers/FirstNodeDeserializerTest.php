<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\FirstNode;
use PPP\DataModel\MissingNode;

/**
 * @covers PPP\DataModel\Deserializers\FirstNodeDeserializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class FirstNodeNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new FirstNodeDeserializer(new DeserializerFactory());
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'first',
					'list' => array('type'=>'missing')
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
				new FirstNode(new MissingNode()),
				array(
					'type' => 'first',
					'list' => array('type' => 'missing')
				)
			),
		);
	}
}
