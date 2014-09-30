<?php

namespace PPP\DataModel\Deserializers;
use Deserializers\Deserializer;
use PPP\DataModel\TripleNode;

/**
 * @covers PPP\DataModel\Deserializers\TripleNodeDeserializer
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new TripleNodeDeserializer();
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'triple',
					'subject' => 's',
					'predicate' => 'p',
					'object' => 'o'
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
			)
		);
	}

	/**
	 * @see DeserializerBaseTest::deserializationProvider
	 */
	public function deserializationProvider() {
		return array(
			array(
				new TripleNode('s', 'p', 'o'),
				array(
					'type' => 'triple',
					'subject' => 's',
					'predicate' => 'p',
					'object' => 'o'
				)
			)
		);
	}
}
