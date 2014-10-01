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
}
