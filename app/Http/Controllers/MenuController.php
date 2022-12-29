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
        return view('pages.menus.index');
    }

    public function edit(Request $request, Menu $menu)
    {
        return view('pages.menus.edit', compact('menu'));
    }

    public function update(Request $request)
    {
    }

    public function create()
    {
        return view('pages.menus.create');
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
