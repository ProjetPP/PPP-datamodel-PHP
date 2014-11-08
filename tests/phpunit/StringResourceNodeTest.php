<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\StringResourceNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class StringResourceNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetValue() {
		$node = new StringResourceNode('foo');
		$this->assertEquals('foo', $node->getValue());
	}

	public function testGetLanguageCode() {
		$node = new StringResourceNode('foo', 'fr');
		$this->assertEquals('fr', $node->getLanguageCode());
	}

	public function testGetValueType() {
		$node = new StringResourceNode('foo');
		$this->assertEquals('string', $node->getValueType());
	}

	public function testGetType() {
		$node = new StringResourceNode('foo');
		$this->assertEquals('resource', $node->getType());
	}

	public function testEquals() {
		$node = new StringResourceNode('a');
		$this->assertTrue($node->equals(new StringResourceNode('a')));
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
				new StringResourceNode('a'),
				new MissingNode()
			),
			array(
				new StringResourceNode('a'),
				new StringResourceNode('b')
			),
		);
	}
}
