<?php

namespace Bantenprov\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Workflow\Facades\Workflow;
use Bantenprov\Workflow\Models\History;
use That0n3guy\Transliteration;
use Carbon\Carbon;
use Validator, Image, Session, File, Response, Redirect, Exception;

class HistoryController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $historys = History::with('getApiKeys')
                         ->with('getWorkflow')
                         ->with('getStateFrom')
                         ->with('getStateTo')
                         ->with('getUserName')
                         ->paginate(10);
      $now = Carbon::now();
      $dates = [];
      foreach($historys as $history)
      {
        $end = Carbon::parse($history->created_at);
        array_push($dates,$end->diffForHumans($now));
      }
      return view('workflow.history.index',compact('historys', 'dates'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
