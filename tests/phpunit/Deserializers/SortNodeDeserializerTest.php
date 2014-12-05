<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\ResourceListNode;
use PPP\DataModel\StringResourceNode;
use PPP\DataModel\SortNode;

/**
 * @covers PPP\DataModel\Deserializers\SortNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SortNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new SortNodeDeserializer(new DeserializerFactory(), new StringResourceNodeDeserializer());
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'sort',
					'subject' => array('type' => 'resource', 'value' => 's'),
					'predicate' => array('type' => 'resource', 'value' => 'p')
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
				new SortNode(
					new ResourceListNode(array(new StringResourceNode('s'))),
					new StringResourceNode('p')
				),
				array(
					'type' => 'sort',
					'list' => array('type'=> 'list', 'list' => array(array('type' => 'resource', 'value' => 's'))),
					'predicate' => array('type' => 'resource', 'value' => 'p')
				)
			)
		);
	}
}
