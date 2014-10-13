<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\MissingNode;
use PPP\DataModel\ResourceNode;

/**
 * @covers PPP\DataModel\Serializers\MissingNodeSerializer
 *
 * @licence GNU GPL v2+
 * @author Thomas Pellissier Tanon
 */
class MissingNodeSerializerTest extends SerializerBaseTest {

	public function buildSerializer() {
		return new MissingNodeSerializer();
	}

	public function serializableProvider() {
		return array(
			array(
				new MissingNode()
			),
		);
	}

	public function nonSerializableProvider() {
		return array(
			array(
				5
			),
			array(
				array()
			),
			array(
				new ResourceNode( 'a' )
			),
		);
	}

	public function serializationProvider() {
		return array(
			array(
				array(
					'type' => 'missing'
				),
				new MissingNode()
			),
		);
	}
}
