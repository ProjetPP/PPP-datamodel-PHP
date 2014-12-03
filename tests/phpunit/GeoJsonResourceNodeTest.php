<?php

namespace PPP\DataModel;

use GeoJson\Geometry\Point;

/**
 * @covers PPP\DataModel\GeoJsonResourceNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class GeoJsonResourceNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetValue() {
		$node = new GeoJsonResourceNode('1, 1', new Point(array(1, 1)));
		$this->assertEquals('1, 1', $node->getValue());
	}

	public function testGetGeoJson() {
		$node = new GeoJsonResourceNode('1, 1', new Point(array(1, 1)));
		$this->assertEquals(new Point(array(1, 1)), $node->getGeoJson());
	}

	public function testGetValueType() {
		$node = new GeoJsonResourceNode('1, 1', new Point(array(1, 1)));
		$this->assertEquals('geo-json', $node->getValueType());
	}

	public function testGetType() {
		$node = new GeoJsonResourceNode('1, 1', new Point(array(1, 1)));
		$this->assertEquals('resource', $node->getType());
	}

	public function testEquals() {
		$node = new GeoJsonResourceNode('1, 1', new Point(array(1, 1)));
		$this->assertTrue($node->equals(new GeoJsonResourceNode('1, 1', new Point(array(1, 1)))));
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
				new GeoJsonResourceNode('1, 1', new Point(array(1, 1))),
				new MissingNode()
			),
			array(
				new GeoJsonResourceNode('1, 1', new Point(array(1, 1))),
				new GeoJsonResourceNode('1, 1', new Point(array(1, 2)))
			),
		);
	}
}
