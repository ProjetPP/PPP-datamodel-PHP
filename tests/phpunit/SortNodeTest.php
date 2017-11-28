<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\SortNode
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class SortNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetOperand() {
		$sortNode = new SortNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new StringResourceNode('p')
		);
		$this->assertEquals(new ResourceListNode(array(new StringResourceNode('s'))), $sortNode->getOperand());
	}

	public function testGetPredicate() {
		$sortNode = new SortNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new StringResourceNode('p')
		);
		$this->assertEquals(new StringResourceNode('p'), $sortNode->getPredicate());
	}

	public function testGetType() {
		$sortNode = new SortNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new StringResourceNode('p')
		);
		$this->assertEquals('sort', $sortNode->getType());
	}

	public function testEquals() {
		$node = new SortNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new StringResourceNode('p')
		);
		$this->assertTrue($node->equals(new SortNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new StringResourceNode('p')
		)));
	}

	/**
	 * @dataProvider nonEqualsProvider
	 */
	public function testNonEquals(SortNode $node, $target) {
		$this->assertFalse($node->equals($target));
	}

	public function nonEqualsProvider() {
		return array(
			array(
				new SortNode(
					new ResourceListNode(array(new StringResourceNode('s'))),
					new StringResourceNode('p')
				),
				new MissingNode()
			),
			array(
				new SortNode(
					new ResourceListNode(array(new StringResourceNode('s'))),
					new StringResourceNode('p')
				),
				new SortNode(
					new MissingNode(),
					new StringResourceNode('p')
				)
			),
			array(
				new SortNode(
					new ResourceListNode(array(new StringResourceNode('s'))),
					new StringResourceNode('p')
				),
				new SortNode(
					new ResourceListNode(array(new StringResourceNode('s'))),
					new StringResourceNode('q')
				)
			),
		);
	}
}
