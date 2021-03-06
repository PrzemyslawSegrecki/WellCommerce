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

namespace WellCommerce\Bundle\AppBundle\Entity;

use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use WellCommerce\Bundle\DoctrineBundle\Entity\AbstractTranslation;

/**
 * Class DictionaryTranslation
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class DictionaryTranslation extends AbstractTranslation
{
    use Translation;
    
    protected $value = '';
    
    public function getValue(): string
    {
        return $this->value;
    }
    
    public function setValue(string $value)
    {
        $this->value = $value;
    }
}
