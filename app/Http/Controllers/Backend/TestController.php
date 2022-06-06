<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

class TestController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'TestCase';

        // module name
        $this->module_name = 'test';

        // directory path of the module
        $this->module_path = 'test';

        // module icon
        $this->module_icon = 'c-icon fas fa-bell';

        // module model name, path
        $this->module_model = "App\Models\Test";
    }

    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = auth()->user()->notifications()->paginate();
        $unread_notifications_count = auth()->user()->unreadNotifications()->count();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return view(
            "backend.$module_path.index",
            compact('module_title', 'module_name', "$module_name", 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'unread_notifications_count')
        );
    }

    public function create()
    {
        return view('backend.test.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
      
        Test::create($request->all());
       
        return redirect()->route('backend.test.index')
                        ->with('success','Test created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $Test)
    {
        return view('backend.test.show',compact('Test'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $Test)
    {
        return view('backend.test.edit',compact('Test'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $Test)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
      
        $Test->update($request->all());
      
        return redirect()->route('backend.test.index')
                        ->with('success','Test updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $Test)
    {
        $Test->delete();
       
        return redirect()->route('backend.test.index')
                        ->with('success','Test deleted successfully');
    }
}