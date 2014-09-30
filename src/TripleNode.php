<?php

namespace PPP\DataModel;

use DataValues\DataValue;

/**
 * A (subject, predicate, object) triple.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TripleNode extends AbstractNode {

	/**
	 * @var DataValue
	 */
	private $subject;

	/**
	 * @var DataValue
	 */
	private $predicate;

	/**
	 * @var DataValue
	 */
	private $object;

	/**
	 * @param DataValue $subject
	 * @param DataValue $predicate
	 * @param DataValue $object
	 */
	public function __construct(DataValue $subject, DataValue $predicate, DataValue $object) {
		$this->subject = $subject;
		$this->predicate = $predicate;
		$this->object = $object;
	}

	/**
	 * @return DataValue
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * @return DataValue
	 */
	public function getPredicate() {
		return $this->predicate;
	}

	/**
	 * @return DataValue
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
