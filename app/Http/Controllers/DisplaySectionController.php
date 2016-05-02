<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\DisplaySection;
use Session;

class DisplaySectionController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $displaySection = new DisplaySection;

    //Return all schools
    $displaySections = DisplaySection::orderBy('pBand', 'pGrade', 'moePoint', 'mindefPoint')->get();

    return View::make('displaySections.index')
      ->with('displaySection', $displaySection)
      ->with('displaySections', $displaySections);
  }
  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $displaySection = new MindefAge;
    $displaySection = DisplaySection::find($id);
    $displaySection->pBand = Input::get('pBand');
    $displaySection->pGrade = Input::get('pGrade');
    $displaySection->moePoint = Input::get('moePoint');
    $displaySection->mindefPoint = Input::get('mindefPoint');
    $displaySection->save();

    Session::flash('message', 'Successfully updated!');
    return Redirect::to('displaySections');
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
    $displaySection = DisplaySection::find($id);

    return View::make('displaysections.edit')
        ->with('displaySection', $displaySection);
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
    $displaySection = DisplaySection::find($id);
    $displaySection->pBand = Input::get('pBand');
    $displaySection->pGrade = Input::get('pGrade');
    $displaySection->moePoint = Input::get('moePoint');
    $displaySection->mindefPoint = Input::get('mindefPoint');
    $displaySection->save();

    Session::flash('message', 'Successfully updated!');
    return Redirect::to('displaySections');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
}
