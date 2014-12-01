<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\ResourceListNode;
use PPP\DataModel\StringResourceNode;

/**
 * @covers PPP\DataModel\Deserializers\ResourceAsResourceListNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceAsResourceListNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new ResourceAsResourceListNodeDeserializer(new StringResourceNodeDeserializer());
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array('type' => 'resource', 'value-type' => 'string', 'value' => 's')
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
				new ResourceListNode(array(new StringResourceNode('s'))),
				array('type' => 'resource', 'value-type' => 'string', 'value' => 's')
			),
		);
	}
}
