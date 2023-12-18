<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Illuminate\Support\Arr;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  function __construct()
    // {
    //      $this->middleware('permission:permissions-list|permissions-create|permissions-edit|permissions-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:permissions-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:permissions-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:permissions-delete', ['only' => ['destroy']]);
    // }

    public function index()
    
    {
        $permission = DB::table("permissions")->get();
        return view('permissions.index',compact('permission'));

        //     $permission = Permission::all()->paginate(5);
        // return view('permissions.index',compact('permissions'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
            'gaurd_name' => 'required',
        ]);
    
        $permission = Permission::create([
            'name' => $request->input('name'),
            'guard_name' => $request->input('guard_name'),
        ]);
    
        return redirect()->route('permissions.index')
                        ->with('success','Permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    // Find the permission by its ID
    $permission = Permission::findOrFail($id);

    // Pass the permission data to the edit view
    return view('permissions.edit', compact('permission'));   
 }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
    $this->validate($request, [
        'name' => 'required|unique:permissions,name,' . $id, // Ignore the current permission with the same name
        'guard_name' => 'required',
    ]);

    // Find the permission by its ID
    $permission = Permission::findOrFail($id);

    // Update the permission's properties
    $permission->name = $request->input('name');
    $permission->guard_name = $request->input('guard_name');
    $permission->save();

    return redirect()->route('permissions.index')
                    ->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Find the permission by its ID
    $permission = Permission::findOrFail($id);

    // Delete the permission
    $permission->delete();

    return redirect()->route('permissions.index')
                    ->with('success', 'Permission deleted successfully');
    }
}
