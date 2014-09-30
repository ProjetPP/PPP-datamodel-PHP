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
		$tripleNode = new TripleNode('s', 'p', 'o');
		$this->assertEquals('s', $tripleNode->getSubject());
	}

	public function testGetPredicate() {
		$tripleNode = new TripleNode('s', 'p', 'o');
		$this->assertEquals('p', $tripleNode->getPredicate());
	}

	public function testGetObject() {
		$tripleNode = new TripleNode('s', 'p', 'o');
		$this->assertEquals('o', $tripleNode->getObject());
	}

	public function testGetType() {
		$tripleNode = new TripleNode(null, null, null);
		$this->assertEquals('triple', $tripleNode->getType());
	}
}
