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
		$this->assertInstanceOf( 'Deserializers\Deserializer', $factory->newNodeDeserializer());
	}
}
