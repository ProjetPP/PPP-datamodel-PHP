<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\ResourceListNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceListNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetHasResourceReturnsTrue() {
		$listNode = new ResourceListNode(array(new StringResourceNode('foo')));
		$this->assertTrue($listNode->hasResource(new StringResourceNode('foo')));
	}

	public function testGetHasResourceReturnsFalse() {
		$listNode = new ResourceListNode();
		$this->assertFalse($listNode->hasResource(new StringResourceNode('foo')));
	}

	public function testGetType() {
		$listNode = new ResourceListNode();
		$this->assertEquals('list', $listNode->getType());
	}

	public function testEquals() {
		$node = new ResourceListNode(array(new StringResourceNode('foo'), new StringResourceNode('bar')));
		$this->assertTrue($node->equals(new ResourceListNode(array(new StringResourceNode('foo'), new StringResourceNode('bar')))));
	}

	/**
	 * @dataProvider nonEqualsProvider
	 */
	public function testNonEquals(ResourceListNode $node, $target) {
		$this->assertFalse($node->equals($target));
	}

	public function nonEqualsProvider() {
		return array(
			array(
				new ResourceListNode(array(new StringResourceNode('foo'), new StringResourceNode('bar'))),
				new MissingNode()
			),
			array(
				new ResourceListNode(array(new StringResourceNode('foo'), new StringResourceNode('bar'))),
				new ResourceListNode(array(new StringResourceNode('foo'))),
			),
			array(
				new ResourceListNode(array(new StringResourceNode('foo'), new StringResourceNode('bar'))),
				new ResourceListNode(array(new StringResourceNode('foo')), new StringResourceNode('bar2')),
			),
			array(
				new ResourceListNode(array(new StringResourceNode('foo'), new StringResourceNode('bar'))),
				new ResourceListNode(array(new StringResourceNode('bar')), new StringResourceNode('foo')),
			),
		);
	}

	public function testCount() {
		$listNode = new ResourceListNode(array(new StringResourceNode('foo')));
		$this->assertEquals(1, $listNode->count());
	}

	public function testIterator() {
		$listNode = new ResourceListNode(array(new StringResourceNode('foo')));
		foreach($listNode as $resource) {
			$this->assertEquals(new StringResourceNode('foo'), $resource);
		}
	}

	public function testBuildFilterDuplicates() {
		$listNode = new ResourceListNode(array(
			new StringResourceNode('foo'),
			new StringResourceNode('bar'),
			new StringResourceNode('foo')
		));
		$this->assertEquals(2, $listNode->count());
	}

	public function testBuildWithResourceList() {
		$listNode = new ResourceListNode(array(
			new StringResourceNode('foo'),
			new ResourceListNode(array(new StringResourceNode('bar')))
		));
		$this->assertEquals(2, $listNode->count());
	}
}
