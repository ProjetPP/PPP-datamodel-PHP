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
	 * @var string|null
	 */
	private $subject;

	/**
	 * @var string|null
	 */
	private $predicate;

	/**
	 * @var string|null
	 */
	private $object;

	/**
	 * @param string|null $subject
	 * @param string|null $predicate
	 * @param string|null $object
	 */
	public function __construct($subject, $predicate, $object) {
		$this->subject = $subject;
		$this->predicate = $predicate;
		$this->object = $object;
	}

	public function getSubject() {
		return $this->subject;
	}

	public function getPredicate() {
		return $this->predicate;
	}

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
