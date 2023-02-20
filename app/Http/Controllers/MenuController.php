<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{

    public function index()
    {
        $dishes = Dish::latest()->get();
        $current = 'index';
        return view('pages.menus.index', compact('dishes', 'current'));
    }

    public function create()
    {
        $current = 'create';
        return view('pages.menus.create', compact('current'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('dishes', 'name')],
            'description' => 'required', 'min:3',
            'duration' => ['required', 'numeric'],
        ]);

        if ($request->hasFile('image')) {
            $fileName = preg_replace("/[(\.)(\s)]/", "", $formFields['name']);
            $fileType = $request->file('image')->getClientOriginalExtension();
            $formFields['image'] = $request->file('image')->storeAs('dishes', $fileName . '.' . $fileType, 'public');
        }
        Dish::create($formFields);

        return redirect()->route('manage-dishes')->with('success', $formFields['name'] . ' has been added successfully');
    }

    public function edit(Request $request, Dish $dish)
    {
        $current = 'update';
        return view('pages.menus.edit', compact('dish', 'current'));
    }

    public function update(Request $request, Dish $dish)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => 'required',
            'duration' => ['required', 'numeric'],
        ]);

        if ($request->hasFile('image')) {
            $fileName = preg_replace("/[(\.)(\s)]/", "", $formFields['name']);
            $fileType = $request->file('image')->getClientOriginalExtension();
            $formFields['image'] = $request->file('image')->storeAs('dishes', $fileName . '.' . $fileType, 'public');
        }

        $dish->update($formFields);

        return redirect()->route('get-dishes')
            ->with('success', $dish->name . ' has been updated successfully');
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route("manage-dishes")->with('success', $dish->name . ' has been deleted successfully');
    }

    public function show(Dish $dish)
    {
        return view('menus.show', [
            'currnet' => 'manage',
            'dish' => $dish,
        ]);
    }

    public function manage()
    {
        $dishes = Dish::latest()->filter(request(['tag', 'search']))->get();
        return view('pages.menus.manage', ['current' => 'manage', 'dishes' => $dishes]);
    }
}
