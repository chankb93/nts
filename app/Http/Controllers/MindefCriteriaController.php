<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\MindefCriteria;
use App\MindefAge;
use Session;

class MindefCriteriaController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $MindefCriteria = new MindefCriteria;
    $MindefCriterias = MindefCriteria::orderBy('gender', 'dec')->get();
    $mindefAges = MindefAge::lists('age', 'id');

    return View::make('mindefcriterias.index')
      ->with('mindefCriteria', $MindefCriteria)
      ->with('mindefCriterias', $MindefCriterias)
      ->with('mindefages', $mindefAges);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $mindefCriteria = new MindefCriteria;
    $mindefCriteria->mindefage_id = Input::get('mindefage');
    $mindefCriteria->gender = Input::get('gender');
    $mindefCriteria->stations = Input::get('stations');
    $mindefCriteria->mindefPoint = Input::get('mindefPoint');
    $mindefCriteria->maxValue = Input::get('maxValue');
    $mindefCriteria->gauging = Input::get('gauging');
    $mindefCriteria->minValue = Input::get('minValue');
    $mindefCriteria->save();

    Session::flash('message', 'Successfully added criteria!');
    return Redirect::to('mindefcriterias');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id)
  {
    $mindefCriteria = MindefCriteria::find($id);
    $mindefAges = MindefAge::lists('age', 'id');

    return View::make('mindefcriterias.edit')
        ->with('mindefCriteria', $mindefCriteria)
        ->with('mindefAges', $mindefAges);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function update($id)
  {
    $mindefCriteria = MindefCriteria::find($id);
    $mindefCriteria->mindefage_id = Input::get('mindefage');
    $mindefCriteria->gender = Input::get('gender');
    $mindefCriteria->stations = Input::get('stations');
    $mindefCriteria->mindefPoint = Input::get('mindefPoint');
    $mindefCriteria->maxValue = Input::get('maxValue');
    $mindefCriteria->gauging = Input::get('gauging');
    $mindefCriteria->minValue = Input::get('minValue');
    $mindefCriteria->save();


    Session::flash('message', 'Successfully updated criteria!');
    return Redirect::to('mindefcriterias');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $mindefCriteria = MindefCriteria::find($id);
    $mindefCriteria->delete();

    Session::flash('message', 'Successfully deleted criteria!');
    return Redirect::to('mindefcriterias');
  }
}
