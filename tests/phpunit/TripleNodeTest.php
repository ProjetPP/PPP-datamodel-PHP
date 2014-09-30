<?php

namespace PPP\DataModel;

use DataValues\StringValue;

/**
 * @covers PPP\DataModel\TripleNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetSubject() {
		$tripleNode = new TripleNode(new StringValue('s'), new StringValue('p'), new StringValue('o'));
		$this->assertEquals(new StringValue('s'), $tripleNode->getSubject());
	}

	public function testGetPredicate() {
		$tripleNode = new TripleNode(new StringValue('s'), new StringValue('p'), new StringValue('o'));
		$this->assertEquals(new StringValue('p'), $tripleNode->getPredicate());
	}

	public function testGetObject() {
		$tripleNode = new TripleNode(new StringValue('s'), new StringValue('p'), new StringValue('o'));
		$this->assertEquals(new StringValue('o'), $tripleNode->getObject());
	}

	public function testGetType() {
		$tripleNode = new TripleNode(new StringValue('s'), new StringValue('p'), new StringValue('o'));
		$this->assertEquals('triple', $tripleNode->getType());
	}
}
