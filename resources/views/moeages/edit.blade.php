<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Modify Age Group')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modify Age Group
                </div>

                <div class="panel-body">


                    {!! Form::model($moeage, array('route' => array('moeages.update', $moeage->id), 'method' => 'PUT')) !!}

                        <!-- Title form input -->
                        <div class="form-group">
                            {!! Form::label('age', 'Age group:') !!}
                            {!! Form::text('age', null, ['class' => 'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn"></i>Modify Age Group
                        </button>

                    {!! Form::close() !!}

                </div>
        </div>
      </div>


@endsection
