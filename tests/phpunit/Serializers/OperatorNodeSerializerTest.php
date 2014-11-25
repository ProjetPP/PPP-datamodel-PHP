<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\MissingNode;
use PPP\DataModel\SerializerFactory;
use PPP\DataModel\StringResourceNode;
use PPP\DataModel\UnionNode;

/**
 * @covers PPP\DataModel\Serializers\OperatorNodeSerializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class OperatorNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new OperatorNodeSerializer(new SerializerFactory());
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new UnionNode(array())
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
			array(
				new StringResourceNode('foo')
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
					'type' => 'union',
					'list' => array(
						array('type' => 'missing')
					)
				),
				new UnionNode(array(new MissingNode()))
			),
		);
	}
}
