<?php

namespace PPP\DataModel;

/**
 * A time resource node.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
class TimeResourceNode extends ResourceNode {

	/**
	 * @var string
	 */
	private $calendar;

	/**
	 * @param string $value
	 * @param string $calendar
	 */
	public function __construct($value, $calendar = 'gregorian') {
		$this->calendar = $calendar;

		parent::__construct($value);
	}

	/**
	 * @return string
	 */
	public function getCalendar() {
		return $this->calendar;
	}

	/**
	 * @return string
	 */
	public function getValueType() {
		return 'time';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self &&
			$this->getValue() === $target->getValue() &&
			$this->calendar === $target->calendar;
	}
}
