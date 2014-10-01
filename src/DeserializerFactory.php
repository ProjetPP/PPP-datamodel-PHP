<?php

namespace PPP\DataModel;

use Deserializers\Deserializer;
use Deserializers\DispatchingDeserializer;
use PPP\DataModel\Deserializers\MissingNodeDeserializer;
use PPP\DataModel\Deserializers\ResourceNodeDeserializer;
use PPP\DataModel\Deserializers\TripleNodeDeserializer;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class DeserializerFactory {

	/**
	 * @var Deserializer
	 */
	private $nodeDeserializer = null;

	public function __construct() {
		$this->nodeDeserializer = $this->buildNodeDeserializer();
	}

	private function buildNodeDeserializer() {
		return new DispatchingDeserializer(array(
			new MissingNodeDeserializer(),
			new ResourceNodeDeserializer(),
			new TripleNodeDeserializer($this)
		));
	}

	/**
	 * @return Deserializer
	 */
	public function newNodeDeserializer() {
		return $this->nodeDeserializer;
	}
}
