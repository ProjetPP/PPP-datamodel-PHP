<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\MissingNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class MissingNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetType() {
		$node = new MissingNode();
		$this->assertEquals('missing', $node->getType());
	}

	public function testEquals() {
		$node = new MissingNode();
		$this->assertTrue($node->equals(new MissingNode()));
	}

	public function testNonEquals() {
		$node = new MissingNode();
		$this->assertFalse($node->equals(2));
	}
}
