<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Modify MOE Criteria')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modify MOE Criteria
                </div>

                <div class="panel-body">


                    {!! Form::model($moeCriteria, array('route' => array('moecriterias.update', $moeCriteria->id), 'method' => 'PUT')) !!}
                    <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                        <!-- Title form input -->
                        <div class="form-group">
                            {!! Form::label('moeage', 'Age Group:') !!}
                            {!! Form::select('moeage', $moeAges) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'Gender:') !!}
                            {!! Form::select('gender', array('M' => 'Male', 'F' => 'Female')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('stations', 'Stations:') !!}
                            {!! Form::select('stations', array('Sit-up' => 'Sit-up', 'Standing Broad Jump' => 'Standing Broad Jump'
                            , 'Sit &amp; Reach' => 'Sit &amp; Reach', 'Push-up' => 'Push-up', 'Shuttle Run' => 'Shuttle Run', '2.4km' => '2.4km')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('pGrade', 'Performance Grade:') !!}
                            {!! Form::select('pGrade', array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('pBand', 'Performance Band:') !!}
                            {!! Form::select('pBand', array('Outstanding' => 'Outstanding', 'Very Good' => 'Very Good', 'Good' => 'Good'
                            , 'Satisfactory' => 'Satisfactory')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('moePoint', 'Points:') !!}
                            {!! Form::text('moePoint', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('minValue', 'Min Value:') !!}
                            {!! Form::text('minValue', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('gauging', 'Gauge:') !!}
                            {!! Form::select('gauging', array('>' => 'GREATER', '<' => 'LESSER', '=' => 'EQUAL', '-' => 'WITHIN')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('maxValue', 'Max Value:') !!}
                            {!! Form::text('maxValue', null, ['class' => 'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn"></i>Modify MOE Criteria
                        </button>

                    {!! Form::close() !!}

                </div>
        </div>
      </div>


@endsection
