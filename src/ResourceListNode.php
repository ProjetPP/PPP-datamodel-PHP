<?php

namespace PPP\DataModel;

use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * A list of resources node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class ResourceListNode extends AbstractNode implements IteratorAggregate, Countable {

	/**
	 * @var ResourceNode[]
	 */
	private $resources = array();

	/**
	 * @param ResourceNode[] $resources
	 */
	public function __construct(array $resources = array()) {
		foreach($resources as $resource) {
			$this->appendResource($resource);
		}
	}

	private function appendResource(ResourceNode $resource) {
		if(!$this->hasResource($resource)) {
			$this->resources[] = $resource;
		}
	}

	/**
	 * @param ResourceNode $resource
	 * @return bool
	 */
	public function hasResource(ResourceNode $resource) {
		foreach($this->resources as $resource2) {
			if($resource->equals($resource2)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @see AbstractNode::getType
	 */
	public function getType() {
		return 'list';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		if(!($target instanceof self) || count($this->resources) !== count($target->resources)) {
			return false;
		}

		foreach($this->resources as $resource) {
			if(!$target->hasResource($resource)) {
				return false;
			}
		}

		return true;
	}

	/**
	 * @see IteratorAggregate::getIterator
	 */
	public function getIterator() {
		return new ArrayIterator($this->resources);
	}

	/**
	 * @see Countable::count
	 */
	public function count() {
		return count($this->resources);
	}
}
