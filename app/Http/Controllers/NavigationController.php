<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Role;
use App\Navigation;
use App\Helpers\PermissionGenerator as Generator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NavigationController extends Controller
{
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
        $navigations = Navigation::latest()->get();
        return view('backend.navigations.index', compact('navigations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::latest()->get();
        $navs = Navigation::where('parent_id', 0)->latest()->get();
        $roles = Role::all();
        return view('backend.navigations.create', compact('menus', 'navs', 'roles'));
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
            'menu_id' => 'required|integer', 
            'name' => 'required|string|max:255', 
            'icon_class' => 'required|string|max:255',
        ]);

        $data = [
            'menu_id' => $request->menu_id, 
            'name' => $request->name, 
            'label' => Str::slug($request->name), 
            'icon_class' => $request->icon_class, 
            'url' => $request->url, 
            'route' => $request->route, 
            'parent_id' => $request->parent_id,
        ];

        $navigation = Navigation::create($data);

        if ($navigation) {
            if ($request->has('roles')) {
                $navigation->verifyAndAddRole($request->roles);
            }
            (new Generator)->generate($navigation->name);
        }

        return redirect()->route('navigations.index')->with('status', 'Navigation created successfully.');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function show(Navigation $navigation)
    {
        return view('backend.navigations.show', compact('navigation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Navigation $navigation)
    {
        $menus = Menu::latest()->get();
        $navs = Navigation::where('parent_id', 0)->latest()->get();
        $roles = Role::all();
        return view('backend.navigations.edit', compact('navigation', 'menus', 'navs', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navigation $navigation)
    {
        $this->validate($request, [
            'menu_id' => 'required|integer', 
            'name' => 'required|string|max:255', 
            'icon_class' => 'required|string|max:255',
            'active' => 'required',
        ]);

        $old = $navigation->name;

        $navigation->menu_id = $request->menu_id;
        $navigation->name = $request->name;
        $navigation->label = Str::slug($request->name);
        $navigation->icon_class = $request->icon_class;
        $navigation->url = $request->url;
        $navigation->route = $request->route;
        $navigation->parent_id = $request->parent_id;
        $navigation->active = $request->active;

        if ($navigation->save()) {

            if ($request->has('roles')) {
                $navigation->verifyAndAddRole($request->roles);
            }

            (new Generator)->verifyAndGenerate($old, $navigation->name);
        }

        return redirect()->route('navigations.index')->with('status', 'Navigation updated successfully.'); 
    }

    public function detach(Navigation $navigation, Role $role)
    {
        $navigation->roles()->detach($role);
        return back()->with('status', 'Role detached successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Navigation $navigation)
    {
        $navigation->delete();
        return back()->with('status', 'Navigation deleted successfully.');
    }
}
