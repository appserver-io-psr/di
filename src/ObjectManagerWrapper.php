<?php

/**
 * AppserverIo\Psr\Di\ObjectManagerWrapper
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
* @copyright 2016 TechDivision GmbH <info@appserver.io>
* @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
* @link      https://github.com/appserver-io-psr/di
* @link      http://www.appserver.io
*/

namespace AppserverIo\Psr\Di;

use AppserverIo\Psr\Deployment\DescriptorInterface;

/**
 * Wrapper implementation for a object manager implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/di
 * @link      http://www.appserver.io
 */
class ObjectManagerWrapper implements ObjectManagerInterface
{

    /**
     * The object manager instance to be wrapped.
     *
     * @var \AppserverIo\Psr\Di\ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * Injects the passed object manager instance into this wrapper.
     *
     * @param \AppserverIo\Psr\Di\ObjectManagerInterface $objectManager The object manager instance used for initialization
     *
     * @return void
     */
    public function injectObjectManager(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Return's the object manager instance.
     *
     * @return \AppserverIo\Psr\Di\ObjectManagerInterface The object manager instance
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }

    /**
     * Adds the passed object descriptor to the object manager. If the merge flag is TRUE, then
     * we check if already an object descriptor for the class exists before they will be merged.
     *
     * When we merge object descriptors this means, that the values of the passed descriptor
     * will override the existing ones.
     *
     * @param \AppserverIo\Psr\Deployment\DescriptorInterface $objectDescriptor The object descriptor to add
     * @param boolean                                         $merge            TRUE if we want to merge with an existing object descriptor
     *
     * @return void
     */
    public function addObjectDescriptor(DescriptorInterface $objectDescriptor, $merge = false)
    {
        $this->getObjectManager()->addObjectDescriptor($objectDescriptor, $merge);
    }

    /**
     * Returns the object descriptor if we've registered it.
     *
     * @param string $className The class name we want to return the object descriptor for
     *
     * @return \AppserverIo\Psr\Deployment\DescriptorInterface|null The requested object descriptor instance
     * @throws \AppserverIo\Psr\Di\UnknownObjectDescriptorException Is thrown if someone tries to access an unknown object desciptor
     */
    public function getObjectDescriptor($className)
    {
        return $this->getObjectManager()->getObjectDescriptor($className);
    }

    /**
     * Returns the storage with the object descriptors.
     *
     * @return \AppserverIo\Storage\StorageInterface The storage with the object descriptors
     */
    public function getObjectDescriptors()
    {
        return $this->getObjectManager()->getObjectDescriptors();
    }

    /**
     * Query if we've an object descriptor for the passed class name.
     *
     * @param string $className The class name we query for a object descriptor
     *
     * @return boolean TRUE if an object descriptor has been registered, else FALSE
     */
    public function hasObjectDescriptor($className)
    {
        return $this->getObjectManager()->hastObjectDescriptor($className);
    }

    /**
     * Registers the passed object descriptor under its class name.
     *
     * @param \AppserverIo\Psr\Deployment\DescriptorInterface $objectDescriptor The object descriptor to set
     *
     * @return void
     */
    public function setObjectDescriptor(DescriptorInterface $objectDescriptor)
    {
        $this->getObjectManager()->setObjectDescriptor($objectDescriptor);
    }

    /**
     * Adds the passed object descriptor to the object manager. If the merge flag is TRUE, then
     * we check if already an object descriptor for the class exists before they will be merged.
     *
     * When we merge object descriptors this means, that the values of the passed descriptor
     * will override the existing ones.
     *
     * @param \AppserverIo\Psr\Deployment\DescriptorInterface $objectDescriptor The object descriptor to add
     * @param boolean                                         $merge            TRUE if we want to merge with an existing object descriptor
     *
     * @return void
     */
    public function addPreference(DescriptorInterface $objectDescriptor, $merge = false)
    {
        $this->getObjectManager()->addPreference($objectDescriptor);
    }

    /**
     * Return's the preference for the passed class name.
     *
     * @param string $className The class name to return the preference for
     *
     * @return string The preference or the original class name
     */
    public function getPreference($className)
    {
        return $this->getObjectManager()->getPreference($className);
    }
}
