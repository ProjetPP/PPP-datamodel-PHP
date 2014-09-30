<?php

namespace PPP\DataModel;

/**
 * Base class for all nodes.
 *
 * @licence MIT
 * @author Thomas Pellissier Tanon
 */
abstract class AbstractNode {

	/**
	 * Returns the identifier of the node type.
	 *
	 * @return string
	 */
	public abstract function getType();
}
