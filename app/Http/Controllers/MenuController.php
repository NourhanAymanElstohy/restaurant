<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $dishes = Menu::all();
        $current = 'index';
        return view('pages.menus.index', compact('dishes', 'current'));
    }

    public function edit(Request $request, Menu $menu)
    {
        $current = 'update';
        $dish = $menu;
        return view('pages.menus.edit', compact('dish', 'current'));
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->name = $request->name;
        $menu->duration = $request->duration;
        $menu->save();
        return redirect()->route('menus.index')
            ->with('success', $menu->name . ' has been updated successfully');
    }

    public function create()
    {
        $current = 'create';
        return view('pages.menus.create', compact('current'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->duration = $request->duration;
        $menu->save();

        return redirect()->route('menus.index')->with('success', $menu->name . ' has been added successfully');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route("menus.index")->with('success', 'Company has been deleted successfully');
    }
}
