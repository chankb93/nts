<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\MoeCriteria;
use App\MoeAge;
use Session;

class MoeCriteriaController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $moeCriteria = new MoeCriteria;
    $moeCriterias = MoeCriteria::orderBy('gender', 'desc')->get();
    $moeAges = MoeAge::lists('age', 'id');

    return View::make('moecriterias.index')
      ->with('moeCriteria', $moeCriteria)
      ->with('moeCriterias', $moeCriterias)
      ->with('moeages', $moeAges);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $moeCriteria = new MoeCriteria;
    $moeCriteria->moeage_id = Input::get('moeage');
    $moeCriteria->gender = Input::get('gender');
    $moeCriteria->stations = Input::get('stations');
    $moeCriteria->pGrade = Input::get('pGrade');
    $moeCriteria->pBand = Input::get('pBand');
    $moeCriteria->moePoint = Input::get('moePoint');
    $moeCriteria->maxValue = Input::get('maxValue');
    $moeCriteria->gauging = Input::get('gauging');
    $moeCriteria->minValue = Input::get('minValue');
    $moeCriteria->save();

    Session::flash('message', 'Successfully added criteria!');
    return Redirect::to('moecriterias');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id)
  {
    $moeCriteria = MoeCriteria::find($id);
    $moeAges = MoeAge::lists('age', 'id');

    return View::make('moecriterias.edit')
        ->with('moeCriteria', $moeCriteria)
        ->with('moeAges', $moeAges);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function update($id)
  {
    $moeCriteria = MoeCriteria::find($id);
    $moeCriteria->moeage_id = Input::get('moeage');
    $moeCriteria->gender = Input::get('gender');
    $moeCriteria->stations = Input::get('stations');
    $moeCriteria->pGrade = Input::get('pGrade');
    $moeCriteria->pBand = Input::get('pBand');
    $moeCriteria->moePoint = Input::get('moePoint');
    $moeCriteria->maxValue = Input::get('maxValue');
    $moeCriteria->gauging = Input::get('gauging');
    $moeCriteria->minValue = Input::get('minValue');
    $moeCriteria->save();

    Session::flash('message', 'Successfully updated criteria!');
    return Redirect::to('moecriterias');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $moeCriteria = MoeCriteria::find($id);
    $moeCriteria->delete();

    Session::flash('message', 'Successfully deleted criteria!');
    return Redirect::to('moecriterias');
  }
}
