<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Modify MINDEF Criteria')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modify MINDEF Criteria
                </div>

                <div class="panel-body">


                    {!! Form::model($mindefCriteria, array('route' => array('mindefcriterias.update', $mindefCriteria->id), 'method' => 'PUT')) !!}
                    <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                    <!-- Title form input -->
                    <div class="form-group">
                        {!! Form::label('mindefage', 'Age Group:') !!}
                        {!! Form::select('mindefage', $mindefAges) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('gender', 'Gender:') !!}
                        {!! Form::select('gender', array('M' => 'Male', 'F' => 'Female')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('stations', 'Stations:') !!}
                        {!! Form::select('stations', array('Sit-up' => 'Sit-up', 'Push-up' => 'Push-up', '2.4km' => '2.4km')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('mindefPoint', 'Points:') !!}
                        {!! Form::text('mindefPoint', null, ['class' => 'form-control']) !!}
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
                            <i class="fa fa-btn"></i>Modify MINDEF Criteria
                        </button>

                    {!! Form::close() !!}

                </div>
        </div>
      </div>


@endsection
