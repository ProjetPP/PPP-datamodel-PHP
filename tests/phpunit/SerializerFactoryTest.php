<?php

namespace PPP\DataModel;
use PPP\DataModel\Serializers\BasicResourceNodeSerializer;

/**
 * @covers PPP\DataModel\SerializerFactory
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SerializerFactoryTest extends \PHPUnit_Framework_TestCase {

	public function testNewNodeSerializer() {
		$factory = new SerializerFactory(array(new BasicResourceNodeSerializer('test')));
		$this->assertEquals(
			array(
				'type' => 'triple',
				'subject' => array('type' => 'resource', 'value' => 's', 'value-type' => 'string'),
				'predicate' => array('type' => 'sentence', 'value' => 'p'),
				'object' => array('type' => 'missing')
			),
			$factory->newNodeSerializer()->serialize(
				new TripleNode(new StringResourceNode('s'), new SentenceNode('p'), new MissingNode())
			)
		);
	}
}
