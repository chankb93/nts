<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Support;
use Session;

class SupportController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //Create a blank model
        $support = new Support;

        //Return all schools
        $supports = Support::orderBy('description')->get();

        return View::make('supports.index')
                        ->with('support', $support)
                        ->with('supports', $supports);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $support = new Support;
        $support->description = Input::get('description');
        $support->save();

        Session::flash('message', 'Info added!');
        return Redirect::to('supports');
    }

    /**
     *
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $support = Support::find($id);

        return View::make('supports.edit')
        ->with('support', $support);

    }

    /**
     *
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $support = Support::find($id);
        $support->description = Input::get('description');
        $support->save();

        Session::flash('message', 'Successfully updated info!');
        return Redirect::to('supports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $support = Support::find($id);
        $support->delete();

        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('supports');
    }

}
