<?php

namespace PPP\DataModel;

/**
 * Base class for all nodes.
 *
 * @licence AGPLv3+
 * @author Thomas Pellissier Tanon
 */
abstract class AbstractNode {

	/**
	 * Returns the identifier of the node type.
	 *
	 * @return string
	 */
	public abstract function getType();

	/**
	 * Returns if the provided value is equal to the object or not.
	 *
	 * @param mixed $target
	 * @return boolean
	 */
	public abstract function equals( $target );
}
