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
		$this->assertInstanceOf('Serializers\Serializer', $factory->newNodeSerializer());
	}
}
