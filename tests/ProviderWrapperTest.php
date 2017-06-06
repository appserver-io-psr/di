<?php

/**
 * AppserverIo\Psr\Di\ProviderWrapperTest
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

/**
 * Test for the provider wrapper implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/di
 * @link      http://www.appserver.io
 */
class ProviderWrapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if the newInstance() method works as expected.
     *
     * @return void
     */
    public function testGetNewInstance()
    {

        // create a stub for the Provider interface
        $stub = $this->getMock('\AppserverIo\Psr\Di\ProviderInterface');

        // configure the stub
        $stub->expects($this->once())
             ->method('newInstance')
             ->with($className = '\stdClass')
             ->will($this->returnValue(new \stdClass()));

        // create a new wrapper instance
        $wrapper = new ProviderWrapper();
        $wrapper->injectProvider($stub);

        // check if the correct instance will be returned
        $this->assertInstanceOf('\stdClass', $wrapper->newInstance($className));
    }
}
