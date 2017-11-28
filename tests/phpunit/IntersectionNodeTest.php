<?php

namespace PPP\DataModel;

/**
 * @covers PPP\DataModel\IntersectionNode
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class IntersectionNodeTest extends OperatorNodeBaseTest {

	protected function buildNode(array $operands) {
		return new IntersectionNode($operands);
	}

	public function testGetType() {
		$this->assertEquals('intersection', $this->buildNode(array())->getType());
	}
}
