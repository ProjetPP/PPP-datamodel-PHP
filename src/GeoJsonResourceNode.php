<?php

namespace PPP\DataModel;

use GeoJson\GeoJson;

/**
 * A Geo JSON resource node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class GeoJsonResourceNode extends ResourceNode {

	/**
	 * @var GeoJson
	 */
	private $geoJson;

	/**
	 * @param string $value
	 * @param GeoJson $geoJson
	 */
	public function __construct($value, GeoJson $geoJson) {
		$this->geoJson = $geoJson;

		parent::__construct($value);
	}

	/**
	 * @return GeoJson
	 */
	public function getGeoJson() {
		return $this->geoJson;
	}

	/**
	 * @return string
	 */
	public function getValueType() {
		return 'geo-json';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self &&
			$this->geoJson == $target->geoJson;
	}
}
