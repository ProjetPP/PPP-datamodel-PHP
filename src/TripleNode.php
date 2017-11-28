<?php

namespace PPP\DataModel;
/**
 * A (subject, predicate, object) triple.
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class TripleNode extends AbstractNode {

	/**
	 * @var AbstractNode
	 */
	private $subject;

	/**
	 * @var AbstractNode
	 */
	private $predicate;

	/**
	 * @var AbstractNode
	 */
	private $object;

	/**
	 * @param AbstractNode $subject
	 * @param AbstractNode $predicate
	 * @param AbstractNode $object
	 */
	public function __construct(AbstractNode $subject, AbstractNode $predicate, AbstractNode $object) {
		$this->subject = $subject;
		$this->predicate = $predicate;
		$this->object = $object;
	}

	/**
	 * @return AbstractNode
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * @return AbstractNode
	 */
	public function getPredicate() {
		return $this->predicate;
	}

	/**
	 * @return AbstractNode
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

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self &&
			$this->subject->equals($target->subject) &&
			$this->predicate->equals($target->predicate) &&
			$this->object->equals($target->object);
	}
}
