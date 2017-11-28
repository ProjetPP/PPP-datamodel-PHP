<?php

namespace PPP\DataModel\Deserializers;

use PPP\DataModel\DeserializerFactory;
use PPP\DataModel\ResourceListNode;
use PPP\DataModel\StringResourceNode;
use PPP\DataModel\TripleNode;
use PPP\DataModel\UnionNode;

/**
 * @covers PPP\DataModel\Deserializers\TripleNodeDeserializer
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class TripleNodeDeserializerTest extends DeserializerBaseTest {

	/**
	 * @see DeserializerBaseTest::buildDeserializer
	 */
	public function buildDeserializer() {
		return new TripleNodeDeserializer(new DeserializerFactory());
	}

	/**
	 * @see DeserializerBaseTest::deserializableProvider
	 */
	public function deserializableProvider() {
		return array(
			array(
				array(
					'type' => 'triple',
					'subject' => array('type' => 'resource', 'value' => 's'),
					'predicate' => array('type' => 'resource', 'value' => 'p'),
					'object' => array('type' => 'resource', 'value' => 'o')
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
				new TripleNode(
					new ResourceListNode(array(new StringResourceNode('s'))),
					new ResourceListNode(array(new StringResourceNode('p'))),
					new ResourceListNode(array(new StringResourceNode('o')))
				),
				array(
					'type' => 'triple',
					'subject' => array('type'=> 'list', 'list' => array(array('type' => 'resource', 'value' => 's'))),
					'predicate' => array('type' => 'resource', 'value' => 'p'),
					'object' => array('type' => 'resource', 'value' => 'o')
				)
			),
			array(
				new UnionNode(array(
					new TripleNode(
						new ResourceListNode(array(new StringResourceNode('s'))),
						new ResourceListNode(array(new StringResourceNode('p'))),
						new ResourceListNode(array(new StringResourceNode('o')))
					),
					new TripleNode(
						new ResourceListNode(array(new StringResourceNode('o'))),
						new ResourceListNode(array(new StringResourceNode('r'))),
						new ResourceListNode(array(new StringResourceNode('s')))
					)
				)),
				array(
					'type' => 'triple',
					'subject' => array('type'=> 'list', 'list' => array(array('type' => 'resource', 'value' => 's'))),
					'predicate' => array('type' => 'resource', 'value' => 'p'),
					'inverse-predicate' => array('type' => 'resource', 'value' => 'r'),
					'object' => array('type' => 'resource', 'value' => 'o')
				)
			)
		);
	}
}
