<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\FirstNode;
use PPP\DataModel\MissingNode;
use PPP\DataModel\ResourceListNode;
use PPP\DataModel\SerializerFactory;
use PPP\DataModel\StringResourceNode;

/**
 * @covers PPP\DataModel\Serializers\ReducerNodeSerializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class ReducerNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new ReducerNodeSerializer(new SerializerFactory());
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new FirstNode(new ResourceListNode(array(new StringResourceNode('s'))))
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
			),
		);
	}

	/**
	 * @see SerializerBaseTest::serializationProvider
	 */
	public function serializationProvider() {
		return array(
			array(
				array(
					'type' => 'first',
					'list' => array('type' => 'missing')
				),
				new FirstNode(new MissingNode())
			),
		);
	}
}
