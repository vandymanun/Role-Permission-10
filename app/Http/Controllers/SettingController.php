<?php
    
namespace App\Http\Controllers;
    
use App\Models\Setting;
use App\Models\Sub_menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
    
class SettingController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:product-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = DB::table("setting")->get();
        return view('settings.index',compact('settings'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_menus = DB::table("sub_menu")->get();
        return view('settings.create',compact('sub_menus'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'sub_id' => 'required',
            'table_name' => 'required',
            'id_name' => 'required',
            'field' => 'required',
            'keyword' => 'required',
            'upload_title' => 'required',
            'status' => 'required',
      
        ]);
    
        Setting::create($request->all());
    
        return redirect()->route('settings.index')
                        ->with('success','Setting created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('settings.show',compact('setting'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        // $sub_menus = DB::table("sub_menu")->get();
        // return view('settings.edit',compact('setting', 'sub_menus'));

        // Eager load the subMenu relationship
        $setting->load('subMenu');

        // Retrieve all sub_menus (optional)
        $sub_menus = Sub_menu::all();

        return view('settings.edit', compact('setting', 'sub_menus'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
         request()->validate([
            'sub_id' => 'required',
            'table_name' => 'required',
            'id_name' => 'required',
            'field' => 'required',
            'keyword' => 'required',
            'upload_title' => 'required',
            'status' => 'required',
        ]);
    
        $setting->update($request->all());
    
        return redirect()->route('settings.index')
                        ->with('success','Setting updated successfully');
                        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
    
        return redirect()->route('settings.index')
                        ->with('success','Setting deleted successfully');
    }
}