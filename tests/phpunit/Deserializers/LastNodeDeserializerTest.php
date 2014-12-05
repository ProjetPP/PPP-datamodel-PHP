<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\MissingNode;
use PPP\DataModel\LastNode;

/**
 * @covers PPP\DataModel\Deserializers\LastNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class LastNodeNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new LastNodeDeserializer(new DeserializerFactory());
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'last',
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
				new LastNode(new MissingNode()),
				array(
					'type' => 'last',
					'list' => array('type' => 'missing')
				)
			),
		);
	}
}
