<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\MissingNode;
use PPP\DataModel\SentenceNode;

/**
 * @covers PPP\DataModel\Serializers\SentenceNodeSerializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SentenceNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new SentenceNodeSerializer();
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new SentenceNode('foo')
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
					'type' => 'sentence',
					'value' => 'foo'
				),
				new SentenceNode('foo')
			)
		);
	}
}
