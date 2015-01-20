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
		return $target instanceof self &&
			(count(array_intersect($this->getUris(), $target->getUris())) > 0 || $this->graph == $target->graph);
	}

	private function getUris() {
		$uris = array();

		if(property_exists($this->graph, '@id')) {
			$uris[] = $this->graph->{'@id'};
		}

		if(property_exists($this->graph, 'sameAs')) {
			$sameAs = $this->graph->sameAs;
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
