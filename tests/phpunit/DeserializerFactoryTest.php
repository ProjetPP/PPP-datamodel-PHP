<?php

namespace PPP\DataModel;
use PPP\DataModel\Deserializers\BooleanResourceNodeDeserializer;

/**
 * @covers PPP\DataModel\DeserializerFactory
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class DeserializerFactoryTest extends \PHPUnit_Framework_TestCase {

	public function testNewNodeDeserializer() {
		$factory = new DeserializerFactory(array(new BooleanResourceNodeDeserializer()));
		$this->assertEquals(
			new TripleNode(
				new ResourceListNode(array(new StringResourceNode('s'))),
				new UnionNode(array(new SentenceNode('p'))),
				new MissingNode()
			),
			$factory->newNodeDeserializer()->deserialize(array(
				'type' => 'triple',
				'subject' => array('type' => 'resource', 'value' => 's'),
				'predicate' => array(
					'type'=> 'union',
					'list' => array(
						array('type' => 'sentence', 'value' => 'p')
					)
				),
				'object' => array('type' => 'missing')
			))
		);
	}
}
