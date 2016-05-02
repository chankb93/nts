<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\NapfaDate;
use App\School;
use App\Stations;
use Session;

class NapfaDateController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $napfaDate = new NapfaDate;
    $napfaDates = NapfaDate::orderBy('testDate', 'dec')->get();
    $schools = School::lists('name', 'id');

    return View::make('napfadates.index')
      ->with('napfaDate', $napfaDate)
      ->with('napfaDates', $napfaDates)
      ->with('schools', $schools);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $napfaDate = new NapfaDate;
    $napfaDate->school_id = Input::get('school');
    $napfaDate->regOpenDate = Input::get('regOpenDate');
    $napfaDate->regCloseDate = Input::get('regCloseDate');
    $napfaDate->testDate = Input::get('testDate');
    $napfaDate->venue = Input::get('venue');
    $napfaDate->regMax = Input::get('regMax');
    $napfaDate->bidNumStart = Input::get('bidNumStart');
    $napfaDate->stations = Input::get('stations');
    $napfaDate->save();

    Session::flash('message', 'Successfully added test date!');
    return Redirect::to('napfadates');
  }


  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id)
  {
    $napfaDate = NapfaDate::find($id);
    $schools = School::lists('name', 'id');

    return View::make('napfadates.edit')
        ->with('napfaDate', $napfaDate)
        ->with('schools', $schools);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function update($id)
  {
    $napfaDate = NapfaDate::find($id);
    $napfaDate->school_id = Input::get('school');
    $napfaDate->regOpenDate = Input::get('regOpenDate');
    $napfaDate->regCloseDate = Input::get('regCloseDate');
    $napfaDate->testDate = Input::get('testDate');
    $napfaDate->venue = Input::get('venue');
    $napfaDate->regMax = Input::get('regMax');
    $napfaDate->bidNumStart = Input::get('bidNumStart');
    $napfaDate->stations = Input::get('stations');
    $napfaDate->save();

    Session::flash('message', 'Successfully updated test date!');
    return Redirect::to('napfadates');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $napfaDate = NapfaDate::find($id);
    $napfaDate->delete();

    Session::flash('message', 'Successfully deleted test date!');
    return Redirect::to('napfadates');
  }
}
