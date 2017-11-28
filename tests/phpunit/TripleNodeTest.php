<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\TripleNode
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class TripleNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetSubject() {
		$tripleNode = new TripleNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new ResourceListNode(array(new StringResourceNode('p'))),
			new MissingNode()
		);
		$this->assertEquals(new ResourceListNode(array(new StringResourceNode('s'))), $tripleNode->getSubject());
	}

	public function testGetPredicate() {
		$tripleNode = new TripleNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new ResourceListNode(array(new StringResourceNode('p'))),
			new MissingNode()
		);
		$this->assertEquals(new ResourceListNode(array(new StringResourceNode('p'))), $tripleNode->getPredicate());
	}

	public function testGetObject() {
		$tripleNode = new TripleNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new ResourceListNode(array(new StringResourceNode('p'))),
			new MissingNode()
		);
		$this->assertEquals(new MissingNode(), $tripleNode->getObject());
	}

	public function testGetType() {
		$tripleNode = new TripleNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new ResourceListNode(array(new StringResourceNode('p'))),
			new MissingNode()
		);
		$this->assertEquals('triple', $tripleNode->getType());
	}

	public function testEquals() {
		$node = new TripleNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new ResourceListNode(array(new StringResourceNode('p'))),
			new MissingNode()
		);
		$this->assertTrue($node->equals(new TripleNode(
			new ResourceListNode(array(new StringResourceNode('s'))),
			new ResourceListNode(array(new StringResourceNode('p'))),
			new MissingNode()
		)));
	}

	/**
	 * @dataProvider nonEqualsProvider
	 */
	public function testNonEquals(TripleNode $node, $target) {
		$this->assertFalse($node->equals($target));
	}

	public function nonEqualsProvider() {
		return array(
			array(
				new TripleNode(
					new ResourceListNode(array(new StringResourceNode('s'))),
					new MissingNode(),
					new MissingNode()
				),
				new MissingNode()
			),
			array(
				new TripleNode(
					new ResourceListNode(array(new StringResourceNode('s'))),
					new MissingNode(),
					new MissingNode()
				),
				new TripleNode(new MissingNode(), new MissingNode(), new MissingNode())
			),
			array(
				new TripleNode(
					new MissingNode(),
					new ResourceListNode(array(new StringResourceNode('s'))),
					new MissingNode()
				),
				new TripleNode(new MissingNode(), new MissingNode(), new MissingNode())
			),
			array(
				new TripleNode(
					new MissingNode(),
					new MissingNode(),
					new ResourceListNode(array(new StringResourceNode('s')))
				),
				new TripleNode(new MissingNode(), new MissingNode(), new MissingNode())
			),
		);
	}
}
