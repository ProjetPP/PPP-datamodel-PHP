<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\UnionNode
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class UnionNodeTest extends OperatorNodeBaseTest {

	protected function buildNode(array $operands) {
		return new UnionNode($operands);
	}

	public function testGetType() {
		$this->assertEquals('union', $this->buildNode(array())->getType());
	}
}
