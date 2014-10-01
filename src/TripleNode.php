<?php

namespace PPP\DataModel;
/**
 * A (subject, predicate, object) triple.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNode extends AbstractNode {

	/**
	 * @var ResourceNode
	 */
	private $subject;

	/**
	 * @var ResourceNode
	 */
	private $predicate;

	/**
	 * @var ResourceNode
	 */
	private $object;

	/**
	 * @param ResourceNode $subject
	 * @param ResourceNode $predicate
	 * @param ResourceNode $object
	 */
	public function __construct(ResourceNode $subject, ResourceNode $predicate, ResourceNode $object) {
		$this->subject = $subject;
		$this->predicate = $predicate;
		$this->object = $object;
	}

	/**
	 * @return ResourceNode
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * @return ResourceNode
	 */
	public function getPredicate() {
		return $this->predicate;
	}

	/**
	 * @return ResourceNode
	 */
	public function getObject() {
		return $this->object;
	}

	/**
	 * @see AbstractNode::getType
	 */
	public function getType() {
		return 'triple';
	}
}
