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
		$tripleNode = new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new ResourceNode('o'));
		$this->assertEquals(new ResourceNode('s'), $tripleNode->getSubject());
	}

	public function testGetPredicate() {
		$tripleNode = new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new ResourceNode('o'));
		$this->assertEquals(new ResourceNode('p'), $tripleNode->getPredicate());
	}

	public function testGetObject() {
		$tripleNode = new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new ResourceNode('o'));
		$this->assertEquals(new ResourceNode('o'), $tripleNode->getObject());
	}

	public function testGetType() {
		$tripleNode = new TripleNode(new ResourceNode('s'), new ResourceNode('p'), new ResourceNode('o'));
		$this->assertEquals('triple', $tripleNode->getType());
	}
}
