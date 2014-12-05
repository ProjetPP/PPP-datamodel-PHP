<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\LastNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class LastNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetOperand() {
		$node = new LastNode(new ResourceListNode(array(new StringResourceNode('s'))));
		$this->assertEquals(new ResourceListNode(array(new StringResourceNode('s'))), $node->getOperand());
	}

	public function testGetType() {
		$node = new LastNode(new ResourceListNode(array(new StringResourceNode('s'))));
		$this->assertEquals('last', $node->getType());
	}

	public function testEquals() {
		$node = new LastNode(new ResourceListNode(array(new StringResourceNode('s'))));
		$this->assertTrue($node->equals(new LastNode(new ResourceListNode(array(new StringResourceNode('s'))))));
	}

	/**
	 * @dataProvider nonEqualsProvider
	 */
	public function testNonEquals(LastNode $node, $target) {
		$this->assertFalse($node->equals($target));
	}

	public function nonEqualsProvider() {
		return array(
			array(
				new LastNode(new ResourceListNode(array(new StringResourceNode('s')))),
				new MissingNode()
			),
			array(
				new LastNode(new ResourceListNode(array(new StringResourceNode('s')))),
				new LastNode(new ResourceListNode(array(new StringResourceNode('p'))))
			),
		);
	}
}
