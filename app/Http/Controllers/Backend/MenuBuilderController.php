<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuBuilderController extends Controller
{
    public function index($id){
        Gate::authorize('secure.menus.index');
        $menu = Menu::findOrFail($id);
        return view('backend.menus.builder',compact('menu'));
    }
    public function itemCreate($id){
        Gate::authorize('secure.menus.create');
        $menu = Menu::findOrFail($id);
        return view('backend.menus.item.form',compact('menu'));
    }
    public function itemStore(Request $request, $id){
        $this->validate($request,[
            'divider_title' => 'nullable|string',
            'title' => 'nullable|string',
            'url' => 'nullable|string',
            'target' => 'nullable|string',
            'icon_class' => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->menuItems()->create([
            'type' => $request->get('type'),
            'title' => $request->get('title'),
            'divider_title' => $request->get('divider_title'),
            'url' => $request->get('url'),
            'target' => $request->get('target'),
            'icon_class' => $request->get('icon_class'),
        ]);

        notify()->success('Menu Item Successfully Added.', 'Added');
        return redirect()->route('secure.menus.builder',$menu->id);
    }
    public function itemEdit($menuId, $itemId)
    {
        Gate::authorize('secure.menus.edit');
        $menu = Menu::findOrFail($menuId);
        $menuItem = MenuItem::where('menu_id',$menu->id)->findOrFail($itemId);
        return view('backend.menus.item.form',compact('menu','menuItem'));
    }

    /**
     * Update menu item
     * @param Request $request
     * @param $menuId
     * @param $itemId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function itemUpdate(Request $request, $id, $itemId)
    {
        Gate::authorize('secure.menus.edit');
        $menu = Menu::findOrFail($id);
        $menuItem = MenuItem::where('menu_id',$menu->id)
            ->findOrFail($itemId)
            ->update([
            'type' => $request->type,
            'title' => $request->title,
            'divider_title' => $request->divider_title,
            'url' => $request->url,
            'target' => $request->target,
            'icon_class' => $request->icon_class
        ]);
        notify()->success('Menu Item Successfully Updated.', 'Updated');
        return redirect()->route('secure.menus.builder',$menu->id);
    }

    public function itemDestroy($id, $itemId)
    {
        Gate::authorize('secure.menus.destroy');
        $menu = Menu::findOrFail($id);
        $menuItem = MenuItem::where('menu_id',$menu->id)
           ->findOrFail($itemId)
           ->delete();
        notify()->success('Menu Item Successfully deleted', 'Success');
        return back();

    }

    public function order(Request $request){
        Gate::authorize('secure.menus.index');
        $menu_ItemOrder = json_decode($request->get('order'));
        $this->orderMenu($menu_ItemOrder,null);
    }
    private function orderMenu(array $menuItems, $parentId)
    {
        foreach ($menuItems as $index => $item) {
            $menuItem = MenuItem::findOrFail($item->id);
            $menuItem->update([
                'order' => $index + 1,
                'parent_id' => $parentId
            ]);
            if (isset($item->children)) {
                $this->orderMenu($item->children, $menuItem->id);
            }
        }

    }

}
