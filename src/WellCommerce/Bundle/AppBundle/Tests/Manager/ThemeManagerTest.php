<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\AppBundle\Tests\Manager\Admin;

use WellCommerce\Bundle\AppBundle\Entity\Theme;
use WellCommerce\Bundle\DoctrineBundle\Manager\ManagerInterface;
use WellCommerce\Bundle\CoreBundle\Test\Manager\AbstractManagerTestCase;

/**
 * Class ThemeManagerTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ThemeManagerTest extends AbstractManagerTestCase
{
    protected function get(): ManagerInterface
    {
        return $this->container->get('theme.manager');
    }
    
    protected function getExpectedEntityInterface(): string
    {
        return Theme::class;
    }
}
