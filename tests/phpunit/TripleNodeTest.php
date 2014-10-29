<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\TripleNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetSubject() {
		$tripleNode = new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new MissingNode());
		$this->assertEquals(new ResourceNode('s'), $tripleNode->getSubject());
	}

	public function testGetPredicate() {
		$tripleNode = new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new MissingNode());
		$this->assertEquals(new ResourceNode('p'), $tripleNode->getPredicate());
	}

	public function testGetObject() {
		$tripleNode = new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new MissingNode());
		$this->assertEquals(new MissingNode(), $tripleNode->getObject());
	}

	public function testGetType() {
		$tripleNode = new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new MissingNode());
		$this->assertEquals('triple', $tripleNode->getType());
	}

	public function testEquals() {
		$node = new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new MissingNode());
		$this->assertTrue($node->equals(new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new MissingNode())));
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
				new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new MissingNode()),
				new MissingNode()
			),
			array(
				new TripleNode(new ResourceNode('t'), new ResourceNode('p'), new MissingNode()),
				new MissingNode()
			),
			array(
				new TripleNode(new ResourceNode('s'), new ResourceNode('t'), new MissingNode()),
				new MissingNode()
			),
			array(
				new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new ResourceNode('u')),
				new MissingNode()
			),
		);
	}
}
