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
namespace WellCommerce\AppBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use WellCommerce\CoreBundle\EventListener\AbstractEventSubscriber;
use WellCommerce\CoreBundle\Event\FormEvent;
use WellCommerce\AppBundle\Form\Admin\ThemeFormBuilder;
use WellCommerce\AppBundle\Manager\ThemeManagerInterface;

/**
 * Class ThemeSubscriber
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ThemeSubscriber extends AbstractEventSubscriber
{
    /**
     * @var ThemeManagerInterface
     */
    protected $themeManager;

    /**
     * Constructor
     *
     * @param ThemeManagerInterface $themeManager
     */
    public function __construct(ThemeManagerInterface $themeManager)
    {
        $this->themeManager = $themeManager;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER          => ['onKernelController', -10],
            ThemeFormBuilder::FORM_INIT_EVENT => 'onThemeFormInit',
        ];
    }

    /**
     * Sets shop context related session variables
     *
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $frontContext = $this->container->get('shop.context.front');
        $themeContext = $this->container->get('theme.context.front');
        $themeContext->setCurrentTheme($frontContext->getCurrentShop()->getTheme());
    }

    /**
     * Adds theme configuration fields to main theme edit form
     *
     * @param FormEvent $event
     */
    public function onThemeFormInit(FormEvent $event)
    {
        $builder        = $event->getFormBuilder();
        $form           = $builder->getForm();
        $resource       = $builder->getData();
        $fieldGenerator = $this->container->get('theme.fields_generator');

        $fieldGenerator->loadThemeFieldsConfiguration($resource);
        $fieldGenerator->addFormFields($builder, $form);
    }
}