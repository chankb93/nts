<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\School;
use Session;

class SchoolController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $school = new School;

    //Return all schools
    $schools = School::orderBy('name')->get();

    return View::make('schools.index')
      ->with('school', $school)
      ->with('schools', $schools);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $school = new School;
    $school->name = Input::get('name');
    $school->description = Input::get('description');
    $school->save();

    Session::flash('message', 'Successfully added school!');
    return Redirect::to('schools');
  }

  /**
  *
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id)
  {
    $school = School::find($id);

    return View::make('schools.edit')
        ->with('school', $school);
  }

  /**
  *
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function update($id)
  {
    $school = School::find($id);
    $school->name = Input::get('name');
    $school->description = Input::get('description');
    $school->save();

    Session::flash('message', 'Successfully updated school!');
    return Redirect::to('school');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $school = School::find($id);
    $school->delete();

    Session::flash('message', 'Successfully deleted school!');
    return Redirect::to('schools');
  }
}
