<?php

if (!function_exists('Menu')) {

    /**
     * get menu with items and child's by name
     *
     * @param
     * @return mixed
     */
    function Menu($name)
    {
         $menu = \App\Models\Menu::where('name', $name)->first();
        return $menu->menuItems()->with('childs')->get();

    }
}
