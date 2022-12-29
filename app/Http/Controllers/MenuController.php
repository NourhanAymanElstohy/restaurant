<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $late = '';

    public function index()
    {
        $menu_items = Menu::all();
        $current = 'index';
        return view('pages.menus.index', compact('current'));
    }

    public function edit(Request $request, Menu $menu)
    {
        $current = 'update';
        return view('pages.menus.edit', compact('menu', 'current'));
    }

    public function update(Request $request)
    {
    }

    public function create()
    {
        $current = 'create';
        return view('pages.menus.create', compact('current'));
    }

    public function store(Request $request)
    {
        // save db
    }

    public function destroy(Menu $menu)
    {
        // delete record from db
    }
}
