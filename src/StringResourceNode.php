<?php

namespace PPP\DataModel;

/**
 * A string resource node.
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
class StringResourceNode extends ResourceNode {

	/**
	 * @var string
	 */
	private $languageCode;

	/**
	 * @param string $value
	 * @param string $languageCode
	 */
	public function __construct($value, $languageCode = '') {
		$this->languageCode = $languageCode;

		parent::__construct($value);
	}

	/**
	 * @return string
	 */
	public function getLanguageCode() {
		return $this->languageCode;
	}

	/**
	 * @return string
	 */
	public function getValueType() {
		return 'string';
	}

	/**
	 * @see AbstractNode::equals
	 */
	public function equals($target) {
		return $target instanceof self &&
			$this->getValue() === $target->getValue() &&
			$this->languageCode === $target->languageCode;
	}
}
