<?php

namespace PPP\DataModel;

use PPP\DataModel\Serializers\MissingNodeSerializer;
use PPP\DataModel\Serializers\ResourceNodeSerializer;
use PPP\DataModel\Serializers\TripleNodeSerializer;
use Serializers\DispatchingSerializer;
use Serializers\Serializer;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class SerializerFactory {

	/**
	 * @var Serializer
	 */
	private $nodeSerializer = null;

	public function __construct() {
		$this->nodeSerializer = $this->buildNodeSerializer();
	}

	private function buildNodeSerializer() {
		return new DispatchingSerializer(array(
			new MissingNodeSerializer(),
			new ResourceNodeSerializer(),
			new TripleNodeSerializer($this)
		));
	}

	/**
	 * @return Serializer
	 */
	public function newNodeSerializer() {
		return $this->nodeSerializer;
	}
}