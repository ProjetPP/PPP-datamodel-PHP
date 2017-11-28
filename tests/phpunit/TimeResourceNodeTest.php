<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\TimeResourceNode
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class TimeResourceNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetValue() {
		$node = new TimeResourceNode('1111-11-11');
		$this->assertEquals('1111-11-11', $node->getValue());
	}

	public function testGetCalendar() {
		$node = new TimeResourceNode('1111-11-11', 'julian');
		$this->assertEquals('julian', $node->getCalendar());
	}

	public function testGetValueType() {
		$node = new TimeResourceNode('1111-11-11');
		$this->assertEquals('time', $node->getValueType());
	}

	public function testGetType() {
		$node = new TimeResourceNode('1111-11-11');
		$this->assertEquals('resource', $node->getType());
	}

	public function testEquals() {
		$node = new TimeResourceNode('a');
		$this->assertTrue($node->equals(new TimeResourceNode('a')));
	}

	/**
	 * @dataProvider nonEqualsProvider
	 */
	public function testNonEquals(ResourceNode $node, $target) {
		$this->assertFalse($node->equals($target));
	}

	public function nonEqualsProvider() {
		return array(
			array(
				new TimeResourceNode('a'),
				new MissingNode()
			),
			array(
				new TimeResourceNode('a'),
				new TimeResourceNode('b')
			),
		);
	}
}
