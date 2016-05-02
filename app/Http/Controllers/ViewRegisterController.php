<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\ViewRegister;
use App\BookTest;
use App\NapfaDate;
use App\School;
use Session;

class ViewRegisterController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $viewRegister = new ViewRegister;
    $viewRegisters = ViewRegister::orderBy('id')->get();
    $bookTests = BookTest::orderBy('gender', 'dateOfBirth', 'email')->get();

    return View::make('viewregisters.index')
      ->with('viewRegister', $viewRegister)
      ->with('viewRegisters', $viewRegisters)
      ->with('bookTests', $bookTests);
  }

  /**
  *
  *
  * @param  int  $id
  * @return Response
  */

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $viewRegister = new ViewRegister;
    $viewRegister->book_test_id = Input::get('bookTestId');
    $bookTest = BookTest::find($viewRegister->book_test_id);

    $viewRegister->gender = Input::get('gender');
    $viewRegister->dateOfBirth = Input::get('dateOfBirth');
    $viewRegister->email = Input::get('email');

    $viewRegister->save();

    Session::flash('message', 'Successfully booked test date!');
    return Redirect::to('booktests');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $viewRegister = ViewRegister::find($id);

      Session::flash('message', 'Successfully cancel test date!');
      $bookTest->delete();

    return Redirect::to('viewregisters');
  }
}
