<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\FirstNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class FirstNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetOperand() {
		$node = new FirstNode(new ResourceListNode(array(new StringResourceNode('s'))));
		$this->assertEquals(new ResourceListNode(array(new StringResourceNode('s'))), $node->getOperand());
	}

	public function testGetType() {
		$node = new FirstNode(new ResourceListNode(array(new StringResourceNode('s'))));
		$this->assertEquals('first', $node->getType());
	}

	public function testEquals() {
		$node = new FirstNode(new ResourceListNode(array(new StringResourceNode('s'))));
		$this->assertTrue($node->equals(new FirstNode(new ResourceListNode(array(new StringResourceNode('s'))))));
	}

	/**
	 * @dataProvider nonEqualsProvider
	 */
	public function testNonEquals(FirstNode $node, $target) {
		$this->assertFalse($node->equals($target));
	}

	public function nonEqualsProvider() {
		return array(
			array(
				new FirstNode(new ResourceListNode(array(new StringResourceNode('s')))),
				new MissingNode()
			),
			array(
				new FirstNode(new ResourceListNode(array(new StringResourceNode('s')))),
				new FirstNode(new ResourceListNode(array(new StringResourceNode('p'))))
			),
		);
	}
}
