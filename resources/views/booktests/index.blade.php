<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Test Dates')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">

              <div class="panel-heading">
                Booked Test
              </div>

              <div class="panel-body">
                <table class="table table-striped task-table">
                  <!-- Table Headings -->

                  <thead>
                    <tr>
                      <th>Test Date/Time</th>

                      <th>Venue</th>

                      <th>Bid no.</th>

                      <th>[Action]</th>
                    </tr>

                      @if (count($bookTests) > 0)
                    <tbody>
                      @foreach ($bookTests as $bookTest)
                        <tr>
                          <td class="table-text">
                              <div>{{ $bookTest->napfaDate->testDate }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $bookTest->napfaDate->venue }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $bookTest->bidNum }}</div>
                          </td>

                          <td>
                            {!! Form::open(['action' => ['BookTestController@destroy', $bookTest->id], 'method' => 'delete']) !!}
                              {!! Form::submit('Cancel Test Date', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    @endif
                  </thead>
                </table>
              </div>

            <div class="panel-heading">
               Test Dates
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <tr>
                      <th>Registration Close</th>
                      <th>Test Date/Time</th>
                      <th>Venue</th>
                      <th>[Book Test]</th>
                    </tr>

                    @if (count($napfaDates) > 0)
                    <tbody>
                      @foreach ($napfaDates as $napfaDate)
                        <tr>
                          <td class="table-text">
                              <div>{{ $napfaDate->regCloseDate }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $napfaDate->testDate }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $napfaDate->venue }}</div>
                          </td>

                          <td>
                            {!! Form::open(['action' => ['BookTestController@create'], 'method' => 'get']) !!}
                              {!! Form::hidden('napfaDateId', $napfaDate->id) !!}
                              {!! Form::submit('Book!', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    @endif
                </table>
                <!-- resources/views/tasks.blade.php -->
                    <!-- Bootstrap Boilerplate... -->

            </div>
        </div>
      </div>


@endsection
