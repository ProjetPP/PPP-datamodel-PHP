<?php

namespace PPP\DataModel;

use stdClass;

/**
 * @covers PPP\DataModel\JsonLdResourceNode
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class JsonLdResourceNodeTest extends \PHPUnit_Framework_TestCase {

	public function testGetValue() {
		$node = new JsonLdResourceNode('Douglas Adams', (object) array('http://schema.org/name' => 'Douglas Adams'));
		$this->assertEquals('Douglas Adams', $node->getValue());
	}

	public function testGetGraph() {
		$node = new JsonLdResourceNode('Douglas Adams', (object) array('http://schema.org/name' => 'Douglas Adams'));
		$this->assertEquals(((object) array('http://schema.org/name' => 'Douglas Adams')), $node->getGraph());
	}


	public function testGetValueType() {
		$node = new JsonLdResourceNode('Douglas Adams', new stdClass());
		$this->assertEquals('resource-jsonld', $node->getValueType());
	}

	public function testGetType() {
		$node = new JsonLdResourceNode('Douglas Adams', new stdClass());
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
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', '@id' => 'foo')),
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', '@id' => 'foo'))
			),
			array(
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', 'sameAs' => 'foo')),
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', 'sameAs' => array('foo', 'bar')))
			),
			array(
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', '@id' => 'foo')),
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', 'sameAs' => array('foo', 'bar')))
			),
			array(
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', 'sameAs' => array('foo', 'bar'))),
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', '@id' => 'foo'))
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
				new JsonLdResourceNode('Douglas Adams', (object) array('http://schema.org/name' => 'Douglas Adams')),
				new MissingNode()
			),
			array(
				new JsonLdResourceNode('Douglas Adams', (object) array('http://schema.org/name' => 'Douglas Adams')),
				new JsonLdResourceNode('Douglas Adams', (object) array('http://schema.org/name' => 'Douglas Adams'))
			),
			array(
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', '@id' => 'foo')),
				new JsonLdResourceNode('Douglas Adams', (object) array('@context' => 'http://schema.org', '@id' => 'bar'))
			),
		);
	}
}
