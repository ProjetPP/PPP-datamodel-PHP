<?php

namespace PPP\DataModel;

use stdClass;

/**
 * A JSON-LD resource node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class JsonLdResourceNode extends ResourceNode {

	/**
	 * @var stdClass
	 */
	private $graph;

	/**
	 * @param string $value
	 * @param stdClass $graph
	 */
	public function __construct($value, stdClass $graph) {
		$this->setJsonLdDocumentLoader();
		$this->graph = jsonld_compact($graph, 'http://schema.org');

		parent::__construct($value);
	}

	/**
	 * @return stdClass the compacted graph with as @context http://schema.org
	 */
	public function getGraph() {
		return $this->graph;
	}

	/**
	 * @return string
	 */
	public function getValueType() {
		return 'resource-jsonld';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self && $this->resourceEquals($this->graph, $target->graph);
	}

	private function nodeEquals($a, $b) {
		if(is_array($a) && is_array($b)) {
			return $this->arrayEquals($a, $b);
		} elseif($a instanceof stdClass && $b instanceof stdClass) {
			return $this->resourceEquals($a, $b);
		} else {
			return $a == $b;
		}
	}

	private function arrayEquals(array $a, array $b) {
		foreach($a as $aValue) {
			if(!array_reduce($b, function($carry, $bValue) use ($aValue) {
				return $carry || $this->nodeEquals($aValue, $bValue);
			}, false)) {
				return false;
			}
		}

		return true;
	}

	private function resourceEquals(stdClass $a, stdClass $b) {
		if(count(array_intersect($this->getUris($a), $this->getUris($b))) > 0) {
			return true;
		}

		$aArray = get_object_vars($a);
		$bArray = get_object_vars($b);

		if(count($aArray) !== count($bArray)) {
			return false;
		}

		foreach($aArray as $aProperty => $aValue) {
			if(!array_key_exists($aProperty, $bArray) || !$this->nodeEquals($aValue, $bArray[$aProperty])) {
				return false;
			}
		}

		return true;
	}

	private function getUris(stdClass $resource) {
		$uris = array();

		if(property_exists($resource, '@id')) {
			$uris[] = $resource->{'@id'};
		}

		if(property_exists($resource, 'sameAs')) {
			$sameAs = $resource->sameAs;
			if(!is_array($sameAs)) {
				$sameAs = array($sameAs);
			}

			foreach($sameAs as $uri) {
				if(is_string($uri)) {
					$uris[] = $uri;
				}
			}
		}

		return $uris;
	}

	private function setJsonLdDocumentLoader() {
		global $jsonld_default_load_document;

		$jsonld_default_load_document = '\PPP\DataModel\JsonLdResourceNode::customContextLoader';
	}

	public static function customContextLoader($url) {
		if($url !== 'http://schema.org') {
			return jsonld_default_document_loader($url);
		} else {
			return (object) array(
				'contextUrl' => null,
				'document' => file_get_contents(__DIR__ . '/../data/schemaorg-context.jsonld'),
				'documentUrl' => 'http://schema.org'
			);
		}
	}
}
