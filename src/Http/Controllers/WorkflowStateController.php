<?php

namespace Bantenprov\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Workflow\Facades\Workflow;
use Bantenprov\Workflow\Models\WorkflowTransition;
use Bantenprov\Workflow\Models\WorkflowState;
use That0n3guy\Transliteration;

class WorkflowStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */    
    public function index()
    {
        $states = WorkflowState::paginate(10);
                        
        return view('workflow.state.index',compact('states'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('workflow.state.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $name = \Transliteration::clean_filename(strtolower($request->label));
        $label = $request->label;

        try
        {
            WorkflowState::create([
                            'name' => $name,
                            'label' => $label,
                ]);
        }
        catch(\Illuminate\Database\QueryException $e){
            // do what you want here with $e->getMessage();
            return redirect()->route('state')->with('message', 'Error');
        }

        return redirect()->route('state')->with('message', 'Add data success');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $state = WorkflowState::where('id',$id)->first();
        
        return view('workflow.state.edit',['state' => $state]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $name = \Transliteration::clean_filename(strtolower($request->label));
        $label = $request->label;

        try
        {
          WorkflowState::where('id',$id)->update(['label' => $label, 'name' => $name]);
        }
        catch(\Illuminate\Database\QueryException $e){
            // do what you want here with $e->getMessage();
            return redirect()->route('state')->with('message', 'Error');
        }

        return redirect()->route('state')->with('message', 'Update data success');
    }
    /**
     * Activete the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Active($id){
        WorkflowState::where('id',$id)->update(['status' => 1]);

        return redirect()->back();
    }
    /**
     * Deactivete the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function DeActive($id){
        WorkflowState::where('id',$id)->update(['status' => 0]);

        return redirect()->back();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
