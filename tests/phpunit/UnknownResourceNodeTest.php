<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\UnknownResourceNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class UnknownResourceNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetValue() {
		$node = new UnknownResourceNode('Douglas Adams', array('value-type' => 'dd'));
		$this->assertEquals('Douglas Adams', $node->getValue());
	}

	public function testGetValueType() {
		$node = new UnknownResourceNode('Douglas Adams', array('value-type' => 'dd'));
		$this->assertEquals('dd', $node->getValueType());
	}

	public function testGetProperties() {
		$node = new UnknownResourceNode('Douglas Adams', array('value-type' => 'dd'));
		$this->assertEquals(array('value-type' => 'dd'), $node->getProperties());
	}

	public function testGetDefaultValueType() {
		$node = new UnknownResourceNode('Douglas Adams', array());
		$this->assertEquals('unknown', $node->getValueType());
	}

	public function testGetType() {
		$node = new UnknownResourceNode('Douglas Adams', array());
		$this->assertEquals('resource', $node->getType());
	}

	/**
	 * @dataProvider equalsProvider
	 */
	public function testEquals(ResourceNode $node, $target) {
		$this->assertTrue($node->equals($target));
	}

	public function equalsProvider() {
		return array(
			array(
				new UnknownResourceNode('Douglas Adams', array('value-type' => 'dd')),
				new UnknownResourceNode('Douglas Adams', array('value-type' => 'dd'))
			),
		);
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
				new UnknownResourceNode('Douglas Adams', array('value-type' => 'dd')),
				new MissingNode()
			),
			array(
				new UnknownResourceNode('Douglas Adams', array('value-type' => 'dd')),
				new UnknownResourceNode('Douglas Adams', array('value-type' => 'dada'))
			)
		);
	}
}
