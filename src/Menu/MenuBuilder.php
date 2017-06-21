<?php

declare(strict_types=1);

namespace Randock\MetronicBundle\Menu;

use Knp\Menu\ItemInterface;
use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MenuBuilder
{
    /**
     * Constants used to indicate the menu to use in the MenuItemProviders
     */
    public const MAIN_MENU = 'main_menu';
    public const TOP_MENU = 'top_menu';

    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var array
     */
    private $services;

    /**
     * MenuBuilder constructor.
     *
     * @param FactoryInterface   $factory
     * @param ContainerInterface $container
     */
    public function __construct(FactoryInterface $factory, ContainerInterface $container)
    {
        $this->factory = $factory;
        $this->container = $container;
    }

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function createTopMenu(RequestStack $requestStack): ItemInterface
    {
        /** @var ItemInterface $menu */
        $menu = $this->factory->createItem('topmenu');
        $menu->setChildrenAttribute('class', 'dropdown-menu dropdown-menu-default');

        $this->getServices($menu, $this->factory, self::TOP_MENU);

        $this->reorderMenuItems($menu);

        return $menu;
    }

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function createMainMenu(RequestStack $requestStack): ItemInterface
    {
        /** @var ItemInterface $menu */
        $menu = $this->factory->createItem('mainmenu');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $this->getServices($menu, $this->factory, self::MAIN_MENU);
        foreach ($menu as $child) {
            if ($child->hasChildren()) {
                $child->setAttribute('class', 'menu-dropdown classic-menu-dropdown');
                $child->setAttribute('aria-haspopup', 'true');
                $child->setChildrenAttribute('class', 'dropdown-menu');
                $this->addSubmenu($child);
            }
        }

        $this->reorderMenuItems($menu);

        return $menu;
    }

    /**
     * @param ItemInterface $item
     */
    public function addSubmenu(ItemInterface $item)
    {
        foreach ($item as $child) {
            $item->setAttribute('aria-haspopup', 'true');

            if ($child->hasChildren()) {
                $child->setAttribute('class', 'dropdown-submenu');
                $child->setChildrenAttribute('class', 'dropdown-menu');
                $this->addSubmenu($child);
            }
        }
    }

    /**
     * @param array $services
     */
    public function setServices(array $services): void
    {
        $this->services = $services;
    }

    /**
     * @param ItemInterface    $menu
     * @param FactoryInterface $factory
     * @param string           $typeMenu
     */
    public function getServices(ItemInterface $menu, FactoryInterface $factory, string $typeMenu): void
    {
        foreach ($this->services as $service) {
            $menu = $this->container->get($service)->addItems($menu, $factory, $typeMenu);
        }
    }

    /**
     * @param ItemInterface $menu
     */
    public function reorderMenuItems(ItemInterface $menu): void
    {
        $menuOrderArray = [];

        $addLast = [];

        $alreadyTaken = [];

        foreach ($menu->getChildren() as $key => $menuItem) {
            if ($menuItem->hasChildren()) {
                $this->reorderMenuItems($menuItem);
            }

            $orderNumber = $menuItem->getExtra('orderNumber');

            if ($orderNumber !== null) {
                if (!isset($menuOrderArray[$orderNumber])) {
                    $menuOrderArray[$orderNumber] = $menuItem->getName();
                } else {
                    $alreadyTaken[$orderNumber] = $menuItem->getName();
                    // $alreadyTaken[] = array('orderNumber' => $orderNumber, 'name' => $menuItem->getName());
                }
            } else {
                $addLast[] = $menuItem->getName();
            }
        }

        // sort them after first pass
        ksort($menuOrderArray);

        // handle position duplicates
        if (count($alreadyTaken)) {
            foreach ($alreadyTaken as $key => $value) {
                // the ever shifting target
                $keysArray = array_keys($menuOrderArray);

                $position = array_search($key, $keysArray);

                if ($position === false) {
                    continue;
                }

                $menuOrderArray = array_merge(array_slice($menuOrderArray, 0, $position), [$value], array_slice($menuOrderArray, $position));
            }
        }

        // sort them after second pass
        ksort($menuOrderArray);

        // add items without ordernumber to the end
        if (count($addLast)) {
            foreach ($addLast as $key => $value) {
                $menuOrderArray[] = $value;
            }
        }

        if (count($menuOrderArray)) {
            $menu->reorderChildren($menuOrderArray);
        }
    }
}
