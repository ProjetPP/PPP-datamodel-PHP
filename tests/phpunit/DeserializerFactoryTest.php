<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\DeserializerFactory
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class DeserializerFactoryTest extends \PHPUnit_Framework_TestCase {

	public function testNewNodeDeserializer() {
		$factory = new DeserializerFactory();
		$this->assertEquals(
			new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new MissingNode()),
			$factory->newNodeDeserializer()->deserialize(array(
				'type' => 'triple',
				'subject' => array('type' => 'resource', 'value' => 's'),
				'predicate' => array('type' => 'resource', 'value' => 'p'),
				'object' => array('type' => 'missing')
			))
		);
	}
}
