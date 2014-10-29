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

	public function testEquals() {
		$node = new ResourceNode('a');
		$this->assertTrue($node->equals(new ResourceNode('a')));
	}

	/**
	 * @dataProvider nonEqualsProvider
	 */
	public function testNonEquals(ResourceNode $node, $target) {
		$this->assertFalse($node->equals($target));
	}

	public function nonEqualsProvider() {
		return array(
			array(
				new ResourceNode('a'),
				new MissingNode()
			),
			array(
				new ResourceNode('a'),
				new ResourceNode('b')
			),
		);
	}
}
