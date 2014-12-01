<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\MissingNode;
use PPP\DataModel\ResourceListNode;
use PPP\DataModel\StringResourceNode;

/**
 * @covers PPP\DataModel\Serializers\ResourceListNodeSerializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceListNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new ResourceListNodeSerializer(new StringResourceNodeSerializer());
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new ResourceListNode()
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
				new StringResourceNode('true')
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
					'type' => 'list',
					'list' => array(
						array(
							'type' => 'resource',
							'value-type' => 'string',
							'value' => 'foo'
						),
						array(
							'type' => 'resource',
							'value-type' => 'string',
							'value' => 'bar'
						)
					)
				),
				new ResourceListNode(array(
					new StringResourceNode('foo'),
					new StringResourceNode('bar')
				))
			),
			array(
				array(
					'type' => 'resource',
					'value-type' => 'string',
					'value' => 'foo'
				),
				new ResourceListNode(array(new StringResourceNode('foo')))
			),
		);
	}
}
