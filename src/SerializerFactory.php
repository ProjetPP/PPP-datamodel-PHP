<?php

namespace PPP\DataModel;

use PPP\DataModel\Serializers\BasicResourceNodeSerializer;
use PPP\DataModel\Serializers\MissingNodeSerializer;
use PPP\DataModel\Serializers\SentenceNodeSerializer;
use PPP\DataModel\Serializers\StringResourceNodeSerializer;
use PPP\DataModel\Serializers\TimeResourceNodeSerializer;
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
			new TripleNodeSerializer($this),
			new SentenceNodeSerializer(),
			new BasicResourceNodeSerializer('boolean'),
			new StringResourceNodeSerializer(),
			new TimeResourceNodeSerializer()

		));
	}

	/**
	 * @return Serializer
	 */
	public function newNodeSerializer() {
		return $this->nodeSerializer;
	}
}
