<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\MoeAge;
use Session;

class MoeAgeController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $moeAge = new MoeAge;

    //Return all schools
    $moeAges = MoeAge::orderBy('age')->get();

    return View::make('moeages.index')
      ->with('moeage', $moeAge)
      ->with('moeages', $moeAges);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $moeAge = new MoeAge;
    $moeAge->age = Input::get('age');
    $moeAge->save();

    Session::flash('message', 'Successfully added age!');
    return Redirect::to('moeages');
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
    $moeAge = MoeAge::find($id);

    return View::make('moeages.edit')
        ->with('moeage', $moeAge);
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
    $moeAge = MoeAge::find($id);
    $moeAge->age = Input::get('age');
    $moeAge->save();

    Session::flash('message', 'Successfully updated age!');
    return Redirect::to('moeages');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $moeAge = MoeAge::find($id);
    $moeAge->delete();

    Session::flash('message', 'Successfully deleted age!');
    return Redirect::to('moeages');
  }
}
