<?php

/**
 * AppserverIo\Psr\Di\Description\ClassReferenceDescriptorInterface
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/di
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Psr\Di\Description;

use AppserverIo\Psr\EnterpriseBeans\Description\ReferenceDescriptorInterface;

/**
 * Interface for utility classes that stores a class reference configuration.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/di
 * @link      http://www.appserver.io
 */
interface ClassReferenceDescriptorInterface extends ReferenceDescriptorInterface
{

    /**
     * Returns the class type.
     *
     * @return string The class type
     */
    public function getType();

    /**
     * Merges the passed configuration into this one. Configuration values
     * of the passed configuration will overwrite the this one.
     *
     * @param \AppserverIo\Psr\EnterpriseBeans\Description\ClassReferenceDescriptorInterface $classReferenceDescriptor The configuration to merge
     *
     * @return void
     */
    public function merge(ClassReferenceDescriptorInterface $classReferenceDescriptor);
}
