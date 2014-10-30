<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\SerializerFactory
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SerializerFactoryTest extends \PHPUnit_Framework_TestCase {

	public function testNewNodeSerializer() {
		$factory = new SerializerFactory();
		$this->assertEquals(
			array(
				'type' => 'triple',
				'subject' => array('type' => 'resource', 'value' => 's'),
				'predicate' => array('type' => 'sentence', 'value' => 'p'),
				'object' => array('type' => 'missing')
			),
			$factory->newNodeSerializer()->serialize(
				new TripleNode(new ResourceNode('s'), new SentenceNode('p'), new MissingNode())
			)
		);
	}
}
