<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\SentenceNode
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class SentenceNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetValue() {
		$node = new SentenceNode('foo');
		$this->assertEquals('foo', $node->getValue());
	}

	public function testGetType() {
		$node = new SentenceNode('foo');
		$this->assertEquals('sentence', $node->getType());
	}

	public function testEquals() {
		$node = new SentenceNode('a');
		$this->assertTrue($node->equals(new SentenceNode('a')));
	}

	/**
	 * @dataProvider nonEqualsProvider
	 */
	public function testNonEquals(SentenceNode $node, $target) {
		$this->assertFalse($node->equals($target));
	}

	public function nonEqualsProvider() {
		return array(
			array(
				new SentenceNode('a'),
				new MissingNode()
			),
			array(
				new SentenceNode('a'),
				new SentenceNode('b')
			),
		);
	}
}
