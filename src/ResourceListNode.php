<?php

namespace PPP\DataModel;

use ArrayIterator;
use Countable;
use InvalidArgumentException;
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
	 * @param (ResourceNode|ResourceListNode)[] $resources
	 */
	public function __construct(array $resources = array()) {
		foreach($resources as $param) {
			if($param instanceof ResourceNode) {
				$this->appendResource($param);
			} else if($param instanceof ResourceListNode) {
				$this->appendResourceList($param);
			} else {
				throw new InvalidArgumentException('A ResourceListNode can only be build from ResourceNode and ResourceListNode');
			}
		}
	}

	private function appendResource(ResourceNode $resource) {
		if(!$this->hasResource($resource)) {
			$this->resources[] = $resource;
		}
	}

	private function appendResourceList(ResourceListNode $resourceList) {
		foreach($resourceList as $resource) {
			$this->appendResource($resource);
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
	 * @return ResourceNode[]
	 */
	public function toArray() {
		return $this->resources;
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

		$length = count($this->resources);
		for($i = 0; $i < $length; $i++) {
			if(!$target->resources[$i]->equals($this->resources[$i])) {
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

	/**
	 * @return bool
	 */
	public function isEmpty() {
		return empty($this->resources);
	}
}
