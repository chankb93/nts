<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Modify Test Date')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modify NAPFA Test Date
                </div>

                <div class="panel-body">


                    {!! Form::model($napfaDate, array('route' => array('napfadates.update', $napfaDate->id), 'method' => 'PUT')) !!}
                    <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                        <!-- Title form input -->
                        <div class="form-group">
                            {!! Form::label('school', 'School:') !!}
                            {!! Form::select('school', $schools) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('regOpenDate', 'Registration Open Date:') !!}
                            {!! Form::date('regOpenDate', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Content form input -->
                        <div class="form-group">
                            {!! Form::label('regCloseDate', 'Registration Close Date:') !!}
                            {!! Form::date('regCloseDate', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('testDate', 'Test Date/Time:') !!}
                            {!! Form::date('testDate', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('venue', 'Venue:') !!}
                            {!! Form::text('venue', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('regMax', 'Max Registration:') !!}
                            {!! Form::text('regMax', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('bidNumStart', 'Bid From:') !!}
                            {!! Form::text('bidNumStart', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('stations', 'Stations:') !!}
                            <br><br>
                            {!! Form::label('stations[situp]', 'Sit-Up') !!}
                            {!! Form::checkbox('stations[situp]', 1, 'stations[situp] == 1') !!}
                            <br>
                            {!! Form::label('stations[sbj]', 'SBJ') !!}
                            {!! Form::checkbox('stations[sbj]', 1, 'stations[situp] == 1') !!}
                            <br>
                            {!! Form::label('stations[sitAndReach]', 'Sit &amp; Reach') !!}
                            {!! Form::checkbox('stations[sitAndReach]', 1, true) !!}
                            <br>
                            {!! Form::label('stations[pushUp]', 'Push Up') !!}
                            {!! Form::checkbox('stations[pushUp]', 1, true) !!}
                            <br>
                            {!! Form::label('stations[shuttleRun]', 'Shuttle Run') !!}
                            {!! Form::checkbox('stations[shuttleRun]', 1, true) !!}
                            <br>
                            {!! Form::label('stations[running]', '2.4KM Run') !!}
                            {!! Form::checkbox('stations[running]', 1, true) !!}
                        </div>

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn"></i>Modify NAPFA Date
                        </button>

                    {!! Form::close() !!}

                </div>
        </div>
      </div>


@endsection
