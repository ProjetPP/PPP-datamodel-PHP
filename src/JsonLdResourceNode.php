<?php

namespace PPP\DataModel;

use stdClass;

/**
 * A JSON-LD resource node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 *
 * TODO: do the compaction of the graph
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
		$this->graph = $graph;

		parent::__construct($value);
	}

	/**
	 * @return stdClass
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
			count(array_intersect($this->getUris(), $target->getUris())) > 0;
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
}
