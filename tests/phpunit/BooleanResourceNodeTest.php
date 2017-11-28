<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\BooleanResourceNode
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class BooleanResourceNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetValue() {
		$node = new BooleanResourceNode('true');
		$this->assertEquals('true', $node->getValue());
	}

	public function testGetBooleanValue() {
		$node = new BooleanResourceNode('true');
		$this->assertEquals(true, $node->getBooleanValue());
	}

	public function testGetValueType() {
		$node = new BooleanResourceNode('1');
		$this->assertEquals('boolean', $node->getValueType());
	}

	public function testGetType() {
		$node = new BooleanResourceNode('true');
		$this->assertEquals('resource', $node->getType());
	}

	public function testEquals() {
		$node = new BooleanResourceNode('true');
		$this->assertTrue($node->equals(new BooleanResourceNode('1')));
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
				new BooleanResourceNode('true'),
				new StringResourceNode('true')
			),
			array(
				new BooleanResourceNode('true'),
				new BooleanResourceNode('false')
			),
		);
	}
}
