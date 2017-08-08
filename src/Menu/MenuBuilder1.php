<?php

declare(strict_types=1);

namespace Randock\MetronicBundle\Menu;

use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder1 extends MenuBuilder
{

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function createMainMenu(RequestStack $requestStack): ItemInterface
    {
        /** @var ItemInterface $menu */
        $menu = $this->factory->createItem('mainmenu');
        $menu->setChildrenAttribute('class', 'page-sidebar-menu page-header-fixed');

        $this->loadServices($menu, $this->factory, self::MAIN_MENU);
        $this->addSubmenu($menu);

        $this->reorderMenuItems($menu);

        return $menu;
    }

    /**
     * @param ItemInterface $item
     */
    public function addSubmenu(ItemInterface $item)
    {
        foreach ($item as $child) {
            $child->setAttribute('class', 'nav-item');
            if ($child->hasChildren()) {
                $child->setLinkAttribute('class', 'nav-link nav-toggle');
                $child->setAttribute('aria-haspopup', 'true');
                $child->setChildrenAttribute('class', 'sub-menu');
                $this->addSubmenu($child);
            } else {
                $child->setLinkAttribute('class', 'nav-link');
            }
        }
    }
}