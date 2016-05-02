<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Modify school')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modify School
                </div>

                <div class="panel-body">


                    {!! Form::model($school, array('route' => array('schools.update', $school->id), 'method' => 'PUT')) !!}

                        <!-- Title form input -->
                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description:') !!}
                            {!! Form::text('description', null, ['class' => 'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn"></i>Modify School
                        </button>

                    {!! Form::close() !!}

                </div>
        </div>
      </div>


@endsection
