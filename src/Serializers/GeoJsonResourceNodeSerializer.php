<?php

namespace PPP\DataModel\Serializers;

use PPP\DataModel\ResourceNode;
use PPP\DataModel\GeoJsonResourceNode;

/**
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class GeoJsonResourceNodeSerializer extends BasicResourceNodeSerializer {

	public function __construct() {
		parent::__construct('geo-json');
	}

	/**
	 * @see AbstractResourceNodeSerializer::getAdditionalSerialization
	 * @param GeoJsonResourceNode $node
	 */
	protected function getAdditionalSerialization(ResourceNode $node) {
		return array(
			'geojson' => $node->getGeoJson()->jsonSerialize()
		);
	}
}
