<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\SerializerFactory
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class DerializerFactoryTest extends \PHPUnit_Framework_TestCase {

	public function testNewNodeSerializer() {
		$factory = new SerializerFactory();
		$this->assertEquals(
			array(
				'type' => 'triple',
				'subject' => array('type' => 'resource', 'value' => 's'),
				'predicate' => array('type' => 'resource', 'value' => 'p'),
				'object' => array('type' => 'missing')
			),
			$factory->newNodeSerializer()->serialize(
				new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new MissingNode())
			)
		);
	}
}
