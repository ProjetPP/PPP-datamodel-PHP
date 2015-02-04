<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\BooleanResourceNode;
use PPP\DataModel\MissingNode;
use PPP\DataModel\UnknownResourceNode;

/**
 * @covers PPP\DataModel\Serializers\UnknownResourceNodeSerializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnknownResourceNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new UnknownResourceNodeSerializer();
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new UnknownResourceNode('Douglas Adams', array('value-type' => 'dd')),
				new UnknownResourceNode('Douglas Adams', array())
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
					'value' => 'Douglas Adams',
					'value-type' => 'dd'
				),
				new UnknownResourceNode('Douglas Adams', array('value-type' => 'dd'))
			),
		);
	}
}
