<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\BooleanResourceNode;
use PPP\DataModel\JsonLdResourceNode;
use PPP\DataModel\MissingNode;

/**
 * @covers PPP\DataModel\Serializers\JsonLdResourceNodeSerializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class JsonLdResourceNodeSerializerTest extends SerializerBaseTest {

	/**
	 * @see SerializerBaseTest::buildSerializer
	 */
	public function buildSerializer() {
		return new JsonLdResourceNodeSerializer();
	}

	/**
	 * @see SerializerBaseTest::serializableProvider
	 */
	public function serializableProvider() {
		return array(
			array(
				new JsonLdResourceNode('Douglas Adams', (object) array('http://schema.org/name' => 'Douglas Adams'))
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
					'value-type' => 'resource-jsonld',
					'graph' => (object) array('@context' => 'http://schema.org', 'name' => 'Douglas Adams')
				),
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', 'name' => 'Douglas Adams'))
			),
		);
	}
}
