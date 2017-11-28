<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\IntersectionNode;
use PPP\DataModel\MissingNode;

/**
 * @covers PPP\DataModel\Deserializers\IntersectionNodeDeserializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class IntersectionNodeNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new IntersectionNodeDeserializer(new DeserializerFactory());
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'intersection',
					'list' => array()
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
				new IntersectionNode(array(new MissingNode())),
				array(
					'type' => 'intersection',
					'list' => array(
						array('type' => 'missing')
					)
				)
			),
		);
	}
}
