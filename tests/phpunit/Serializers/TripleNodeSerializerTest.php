<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\MissingNode;
use PPP\DataModel\SerializerFactory;
use PPP\DataModel\TripleNode;

/**
 * @covers PPP\DataModel\Serializers\TripleNodeSerializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class TripleNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new TripleNodeSerializer(new SerializerFactory());
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new TripleNode(new MissingNode(), new MissingNode(), new MissingNode())
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
					'type' => 'triple',
					'subject' => array('type' => 'missing'),
					'predicate' => array('type' => 'missing'),
					'object' => array('type' => 'missing')
				),
				new TripleNode(
					new MissingNode(),
					new MissingNode(),
					new MissingNode()
				)
			)
		);
	}
}
