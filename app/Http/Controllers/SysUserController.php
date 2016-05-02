<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\SysUser;
use Session;

class SysUserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //Create a blank model
    $sysUser = new SysUser;
    $sysUsers = SysUser::orderBy('loginID', 'dec')->get();

    return View::make('sysusers.index')
      ->with('sysUser', $sysUser)
      ->with('sysUsers', $sysUsers);
    }

  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
  public function store()
  {
    $sysUser = new sysUser;
    $sysUser->status = Input::get('status');
    $sysUser->loginID = Input::get('loginID');
    $sysUser->userName = Input::get('userName');
    $sysUser->systemRole = Input::get('systemRole');
    $sysUser->email = Input::get('email');
    $sysUser->contact = Input::get('contact');
    $sysUser->save();

    Session::flash('message', 'Successfully added user!');
    return Redirect::to('sysusers');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id)
  {
    $sysUser = sysUser::find($id);

    return View::make('sysusers.edit')
        ->with('sysUser', $sysUser);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function update($id)
  {
    $sysUser = sysUser::find($id);
    $sysUser->status = Input::get('status');
    $sysUser->loginID = Input::get('loginID');
    $sysUser->userName = Input::get('userName');
    $sysUser->systemRole = Input::get('systemRole');
    $sysUser->email = Input::get('email');
    $sysUser->contact = Input::get('contact');
    $sysUser->save();

    Session::flash('message', 'Successfully updated user!');
    return Redirect::to('sysusers');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id)
  {
    $sysUser = sysUser::find($id);
    $sysUser->delete();

    Session::flash('message', 'Successfully deleted user!');
    return Redirect::to('sysusers');
  }
}
