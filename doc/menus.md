## How to use the menus

 
### 1 -Creating the class

#### Create a class that implements Randock\MetronicBundle\Menu\Item\MenuItemProviderInterface Interface.
 
The function that has to be implemented, will have an if inside to indicate to which menu we want to add elements. The posibles values of $typeMenu are MenuBuilder::TOP_MENU and MenuBuilder::MAIN_MENU
 
Example:
 The code inside the if will be executed for the top_menu.

    if (MenuBuilder::TOP_MENU === $typeMenu){
    	//some code
    }

----------


The code inside the if will be executed just for the main_menu

    if (MenuBuilder::MAIN_MENU === $typeMenu){
    	//some code
    }


----------

The code inside the if will be executed for both menus, so if we add elements, they will be added for both menus.

    if (MenuBuilder::TOP_MENU === $typeMenu || MenuBuilder::MAIN_MENU === $typeMenu) {
    	//some code
    }

 
 

### 2 - Adding items to the menus

#### 2.1- How to add items to a menu.
 
-Add an item to the menu root:

This code will add an item named ‘itemName’ to the root menu. Every item that has chilren should have the ‘uri’ attribute set to' javascript:;'. 
 

    $menu->addChild(‘itemName’, ['uri' => 'javascript:;']); 


----------


	
This code will add an item inside the previous item ‘itemName’ making it a submenu. The new item will have a link to the route defined by ‘route_name’.

    $menu[‘itemName’]->addChild(‘itemNameChild’, [‘route’ => ‘route_name’];
 
 
#### 2.2 - Giving order to the menu
To order the menu we have to add an extra parameter ‘orderNumber’ with a value. This parameter will be added with the function setExtra. 

The items sorted from the ones with a lower orderNumber value to the ones with a higher value. The items that have no value for ‘orderNumber’ will be after all the items that have a value.
It is highly recommended to use values with a margin between them. For example 10,20,30,40… This will be useful if we want to add some item between them.
 
Example:
	This code will add an item with an orderNumber value of 20 and then it will add a sibling item with a value of 10. As we said before, the item that we add with a lower value will be at the start of the menu.
 
     $menu['Test']
                ->addChild('Second Item',['uri' => 'javascript:;'])
                ->setExtra('orderNumber', 20);

            $menu['Test']
                ->addChild('First Item',['route' => 'javascript:;'])
                ->setExtra('orderNumber', 10);

 
#### 2.3 Item custom options
The main menu items have the possibility to add to them an icon and a notification.
	
We can use them adding extras like in the next code:
 

    $menu['Test']
        ->addChild('Item name',['uri' => 'javascript:;'])
        ->setExtras(
            [
                'icon' => 'icon-bulb',
                'notification' => 5,
                'notificationType' => 'info'
            ]
        );

#### 2.4 Top menu constraint

The top menu will show just the items with 1 depth.
 
#### 2.5 Top menu divider

To add a divider to the menu, we have to add a child to the root with the function 

           ->setAttribute('class', 'divider')

This code (when rendered in a topMenu) will produce a menu with two items diveded by a divider:

    $menu
        ->addChild('Item1',['uri' => 'javascript:;'])
        ->setExtras(
            [
                'icon' => 'icon-bulb',
                'notification' => 5,
                'notificationType' => 'info'
            ]
        );
    
    
    $menu
        ->addChild('just a divider',[])
        ->setAttribute('class', 'divider');
    
    
    $menu
        ->addChild('Item2',['uri' => 'javascript:;'])
        ->setExtras(
            [
                'icon' => 'icon-bulb',
                'notification' => 5,
                'notificationType' => 'info'
            ]
        );

 
 

### 3 - Create the service

Create a service with the class that has just been created and with the tag 
{ name: metronic.menu_add_items}
 
Example:
 

       service.name:
            class: ClassName
            tags:
                - { name: metronic.menu_add_items }
