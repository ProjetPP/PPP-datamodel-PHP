<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\ResourceNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetValue() {
		$node = new ResourceNode('foo');
		$this->assertEquals('foo', $node->getValue());
	}

	public function testGetType() {
		$node = new ResourceNode('foo');
		$this->assertEquals('resource', $node->getType());
	}
}
