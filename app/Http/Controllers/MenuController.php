<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Role;
use App\Helpers\PermissionGenerator as Generator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{

    protected $status_message;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('backend.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.menus.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $menu = new Menu;

        $menu->name = $request->name;
        $menu->label = Str::slug($request->name);

        if ($menu->save()) {

            if ($request->has('roles')) {
                $menu->verifyAndAddRole($request->roles);
            }

            (new Generator)->generate($menu->name);
        }

        return redirect()->route('menus.index')->with('status', 'Menu saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $roles = Role::all();
        return view('backend.menus.edit', compact('menu', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $old = $menu->name;

        $menu->name = $request->name;
        $menu->label = Str::slug($request->name);

        if ($menu->save()) {

            if ($request->has('roles')) {
                $menu->verifyAndAddRole($request->roles);
            }

            (new Generator)->verifyAndGenerate($old, $menu->name);
        }

        return redirect()->route('menus.index')->with('status', 'Menu updated successfully.');
    }

    public function detach(Menu $menu, Role $role)
    {
        $menu->roles()->detach($role);
        return back()->with('status', 'Role detached successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->with('status', 'Menu deleted successfully');
    }
}
