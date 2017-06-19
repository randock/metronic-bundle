<?php

namespace Randock\MetronicBundle\Menu\Item;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

interface MenuItemProvider
{

    /**
     * @param ItemInterface $menu
     * @param FactoryInterface $factory
     * @param string $typeMenu
     *
     * @return ItemInterface
     */
    public function addItems(ItemInterface $menu,FactoryInterface $factory, string $typeMenu): ItemInterface;


}
