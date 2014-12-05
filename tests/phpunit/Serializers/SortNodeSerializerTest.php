<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\MissingNode;
use PPP\DataModel\SerializerFactory;
use PPP\DataModel\SortNode;
use PPP\DataModel\StringResourceNode;

/**
 * @covers PPP\DataModel\Serializers\SortNodeSerializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SortNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new SortNodeSerializer(new SerializerFactory(), new StringResourceNodeSerializer());
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new SortNode(new MissingNode(), new StringResourceNode('a'))
			)
		);
	}

	/**
	 * @see SerializerBaseTest::nonSerializableProvider
	 */
	public function nonSerializableProvider() {
		return array(
			array(
				42
			),
			array(
				new MissingNode()
			)
		);
	}

	/**
	 * @see SerializerBaseTest::serializationProvider
	 */
	public function serializationProvider() {
		return array(
			array(
				array(
					'type' => 'sort',
					'list' => array('type' => 'missing'),
					'predicate' => array('type' => 'resource', 'value' => 'a', 'value-type' => 'string')
				),
				new SortNode(
					new MissingNode(),
					new StringResourceNode('a')
				)
			)
		);
	}
}
