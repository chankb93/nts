<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\BookTest;
use App\NapfaDate;
use App\School;
use Session;
use Carbon\Carbon;

class BookTestController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $bookTest = new BookTest;
    $bookTests = BookTest::orderBy('id')->get();
    $napfaDates = NapfaDate::orderBy('regCloseDate', 'testDate', 'venue')->get();

    return View::make('booktests.index')
      ->with('bookTest', $bookTest)
      ->with('bookTests', $bookTests)
      ->with('napfaDates', $napfaDates);
  }

  /**
  *
  *
  * @param  int  $id
  * @return Response
  */
  public function create()
  {
    $napfaDateId = Input::get('napfaDateId');
    $napfaDate = NapfaDate::find($napfaDateId);
    $bookTests = BookTest::lists('gender', 'dateOfBirth', 'email');

    return View::make('booktests.edit')
        ->with('napfaDate', $napfaDate)
        ->with('bookTests', $bookTests);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $bookTest = new BookTest;
    $bookTest->napfa_date_id = Input::get('napfaDateId');
    $napfaDate = NapfaDate::find($bookTest->napfa_date_id);

    $bookTestsCount = BookTest::where('napfa_date_id', '=', $bookTest->napfa_date_id)->count();

    if ($bookTestsCount >= $napfaDate->regMax)
    {
      Session::flash('message', 'Exceed registrations!');
      return Redirect::to('booktests');
    }

    if ($bookTestsCount == 0)
    {
      $bookTest->bidNum = $napfaDate->bidNumStart;
    }
    else
    {
      $bookTest->bidNum = $bookTestsCount + 1;
    }

    $bookTest->gender = Input::get('gender');
    $bookTest->dateOfBirth = Input::get('dateOfBirth');
    $bookTest->email = Input::get('email');

    $bookTest->save();

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
    $bookTest = BookTest::find($id);

    $currentDate = Carbon::now();
    $testDate = new Carbon($bookTest->napfaDate->testDate);
    if ($currentDate->diffInDays($testDate) >= 2)
    {
      Session::flash('message', 'Successfully cancel test date!');
      $bookTest->delete();
    }
    else
    {
      Session::flash('message', 'Cannot cancel test date less than 2 days!');
    }

    return Redirect::to('booktests');
  }
}
