<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Display Section')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    NAPFA Test Result Display
                </div>

                <div class="panel-body">


                    {!! Form::model($displaySection, array('route' => array('displaysections.update', $displaySection->id), 'method' => 'PUT')) !!}
                    <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                        <!-- Title form input -->
                        <div class="form-group">
                          {!! Form::checkbox('pBand', 1, 'pBand == 1') !!}
                          {!! Form::label('pBand', 'Performance Band') !!}
                        </div>

                        <div class="form-group">
                          {!! Form::checkbox('pGrade', 1, 'pGrade == 1') !!}
                          {!! Form::label('pGrade', 'Performance Grade') !!}
                        </div>

                        <div class="form-group">
                          {!! Form::checkbox('moePoint', 1, 'moePoint == 1') !!}
                          {!! Form::label('moePoint', 'MOE Point') !!}
                        </div>

                        <div class="form-group">
                          {!! Form::checkbox('mindefPoint', 1, 'mindefPoint == 1') !!}
                          {!! Form::label('mindefPoint', 'MINDEF Point') !!}
                        </div>

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn"></i>Save
                        </button>

                    {!! Form::close() !!}

                </div>
        </div>
      </div>


@endsection
