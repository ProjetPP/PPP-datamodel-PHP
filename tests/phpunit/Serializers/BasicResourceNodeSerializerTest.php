<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\BooleanResourceNode;
use PPP\DataModel\MissingNode;
use PPP\DataModel\StringResourceNode;

/**
 * @covers PPP\DataModel\Serializers\BasicResourceNodeSerializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class BasicResourceNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new BasicResourceNodeSerializer('boolean');
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new BooleanResourceNode('true')
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
					'type' => 'resource',
					'value' => 'true',
					'value-type' => 'boolean'
				),
				new BooleanResourceNode('true')
			),
		);
	}
}
