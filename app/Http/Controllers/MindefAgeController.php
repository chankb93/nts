<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\MindefAge;
use Session;

class MindefAgeController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $mindefAge = new MindefAge;

    //Return all schools
    $mindefAges = MindefAge::orderBy('age')->get();

    return View::make('mindefages.index')
      ->with('mindefage', $mindefAge)
      ->with('mindefages', $mindefAges);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $mindefAge = new MindefAge;
    $mindefAge->age = Input::get('age');
    $mindefAge->save();

    Session::flash('message', 'Successfully added age!');
    return Redirect::to('mindefages');
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
    $mindefAge = MindefAge::find($id);

    return View::make('mindefages.edit')
        ->with('mindefage', $mindefAge);
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
    $mindefAge = MindefAge::find($id);
    $mindefAge->age = Input::get('age');
    $mindefAge->save();

    Session::flash('message', 'Successfully updated age!');
    return Redirect::to('mindefages');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $mindefAge = MindefAge::find($id);
    $mindefAge->delete();

    Session::flash('message', 'Successfully deleted age!');
    return Redirect::to('mindefages');
  }
}
