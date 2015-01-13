<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\JsonLdResourceNode;

/**
 * @covers PPP\DataModel\Deserializers\JsonLdResourceNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class JsonLdResourceNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new JsonLdResourceNodeDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'resource',
					'value' => 'Douglas Adams',
					'value-type' => 'resource-jsonld',
					'graph' => array('@context' => 'http://schema.org', 'name' => 'Douglas Adams')
				)
			)
		);
	}

	/**
	 * @see DeserializerBaseTest::nonDeserializableProvider
	 */
	public function nonDeserializableProvider() {
		return array(
			array(
				42
			),
			array(
				array(
					'type' => 'foo'
				)
			),
			array(
				array(
					'type' => 'resource',
					'value-type' => 'boolean',
					'value' => 'true'
				)
			)
		);
	}

	/**
	 * @see DeserializerBaseTest::deserializationProvider
	 */
	public function deserializationProvider() {
		return array(
			array(
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', 'name' => 'Douglas Adams')),
				array(
					'type' => 'resource',
					'value' => 'Douglas Adams',
					'value-type' => 'resource-jsonld',
					'graph' => (object) array('@context' => 'http://schema.org', 'name' => 'Douglas Adams')
				)
			),
		);
	}
}
