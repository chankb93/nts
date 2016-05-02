
@extends('layouts.app')
@section('title', 'Book Test')
@section('content')
<!-- Bootstrap Boilerplate... -->

<div class="panel panel-default">
  <div class="panel panel-default">
    <div class="panel-heading">
      Fill in particular
    </div>

    <div class="panel-body">
      {!! Form::model($bookTests, array('route' => array('booktests.store'))) !!}
        {!! Form::hidden('napfaDateId', $napfaDate->id) !!}

      <div class="form-group">
        {!! Form::label('gender', 'Gender:') !!} {!! Form::select('gender', array('M' => 'Male', 'F' => 'Female')) !!}
      </div>

      <div class="form-group">
        {!! Form::label('dateOfBirth', 'Date of birth:') !!} {!!
        Form::date('dateOfBirth', \Carbon\Carbon::now(), ['class' =>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('email', 'Email:') !!} {!! Form::text('email', null, ['class' => 'form-control']) !!}
      </div><button type="submit" class="btn btn-default">Add Particular</button> {!!
      Form::close() !!}
    </div>

  </div>
</div>

@endsection
