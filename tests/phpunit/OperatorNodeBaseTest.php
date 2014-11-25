<?php

namespace PPP\DataModel;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
abstract class OperatorNodeBaseTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @param AbstractNode[] $operands
	 * @return OperatorNode
	 */
	protected abstract function buildNode(array $operands);

	public function testGetOperands() {
		$operatorNode = $this->buildNode(array(new StringResourceNode('foo')));
		$this->assertEquals(array(new StringResourceNode('foo')), $operatorNode->getOperands());
	}

	public function testEquals() {
		$node = $this->buildNode(array(new StringResourceNode('foo'), new StringResourceNode('bar')));
		$this->assertTrue($node->equals($this->buildNode(array(new StringResourceNode('bar'), new StringResourceNode('foo')))));
	}

	/**
	 * @dataProvider nonEqualsProvider
	 */
	public function testNonEquals(OperatorNode $node, $target) {
		$this->assertFalse($node->equals($target));
	}

	public function nonEqualsProvider() {
		return array(
			array(
				$this->buildNode(array(new StringResourceNode('foo'), new StringResourceNode('bar'))),
				new MissingNode()
			),
			array(
				$this->buildNode(array(new StringResourceNode('foo'), new StringResourceNode('bar'))),
				$this->buildNode(array(new StringResourceNode('foo'))),
			),
			array(
				$this->buildNode(array(new StringResourceNode('foo'), new StringResourceNode('bar'))),
				$this->buildNode(array(new StringResourceNode('foo')), new StringResourceNode('bar2')),
			),
		);
	}
}
