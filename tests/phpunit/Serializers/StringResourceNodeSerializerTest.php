<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\BooleanResourceNode;
use PPP\DataModel\MissingNode;
use PPP\DataModel\StringResourceNode;

/**
 * @covers PPP\DataModel\Serializers\StringResourceNodeSerializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class StringResourceNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new StringResourceNodeSerializer();
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new StringResourceNode('foo')
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
				new BooleanResourceNode('true')
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
					'type' => 'resource',
					'value' => 'foo',
					'value-type' => 'string'
				),
				new StringResourceNode('foo')
			),
			array(
				array(
					'type' => 'resource',
					'value' => 'foo',
					'value-type' => 'string',
					'language' => 'fr'
				),
				new StringResourceNode('foo', 'fr')
			)
		);
	}
}
