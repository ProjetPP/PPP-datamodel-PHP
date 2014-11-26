<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\MissingNode;
use PPP\DataModel\UnionNode;

/**
 * @covers PPP\DataModel\Deserializers\UnionNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnionNodeNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new UnionNodeDeserializer(new DeserializerFactory());
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'union',
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
				new UnionNode(array(new MissingNode())),
				array(
					'type' => 'union',
					'list' => array(
						array('type' => 'missing')
					)
				)
			),
		);
	}
}
