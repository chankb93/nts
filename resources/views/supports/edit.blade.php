<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Modify Support')
@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel panel-default">
    <div class="panel panel-default">
        <div class="panel-heading">
            Modify School
        </div>

        <div class="panel-body">


            {!! Form::model($support, array('route' => array('supports.update', $support->id), 'method' => 'PUT')) !!}

            <!-- Title form input -->
            {!! Form::label('description', 'Description:') !!}
            <div class="form-group">

                {!! Form::textarea('description', null, ['size' => '35x5']) !!}
            </div>

            <button type="submit" class="btn btn-default">
                <i class="fa fa-btn"></i>Modify Support
            </button>

            {!! Form::close() !!}

        </div>
    </div>
</div>


@endsection
