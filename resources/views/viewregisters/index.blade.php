<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')
@section('title', 'Registered Students')
@section('content')

    <!-- Bootstrap Boilerplate... -->

        <div class="panel panel-default">
            <div class="panel panel-default">

              <div class="panel-heading">
                  Select Date
              </div>

              <div class="panel-body">


                  {!! Form::model($viewRegister, array('route' => array('viewregisters.index'))) !!}
                  <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                      <!-- Title form input -->
                      <div class="form-group">
                          {!! Form::label('date', 'Select date:') !!}
                          {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                      </div>

                      <button type="submit" class="btn btn-default">
                          <i class="fa fa-btn fa-plus"></i>Show
                      </button>

                  {!! Form::close() !!}
                </div>

              <div class="panel panel-default">
                  <div class="panel panel-default">

                  <div class="panel-heading">
                      Cancel Test
                  </div>

                  <div class="panel-body">

                      <!-- {!! Form::open(['url' => 'napfadates']) !!} -->

                          <!-- Title form input -->
                          {!! Form::label('message', 'Message:') !!}
                          <div class="form-group">
                              {!! Form::textarea('message', null, ['size' => '35x5']) !!}
                          </div>

                          <td>
                            {!! Form::open(['action' => ['ViewRegisterController@destroy', $viewRegister->id], 'method' => 'delete']) !!}
                              {!! Form::submit('Cancel Test Date', ['class'=>'btn btn-danger btn-mini']) !!}
                            {!! Form::close() !!}
                          </td>

                      {!! Form::close() !!}
                    </div>

         <div class="panel panel-default">
             <div class="panel panel-default">

              <div class="panel-heading">
                Registered Student
              </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <tr>
                      <th>School</th>
                      <th>Admin no</th>
                      <th>Name</th>
                      <th>Class</th>
                      <th>Age</th>
                      <th>DOB</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>[Action]</th>
                    </tr>

                    @if (count($viewRegisters) > 0)
                    <tbody>
                      @foreach ($viewRegisters as $viewRegister)
                        <tr>
                          <td class="table-text">
                              <div>{{ $viewRegister->napfa_date_id->school }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $viewRegister->adminNum }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $viewRegister->name }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $viewRegister->class }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $viewRegister->age }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $viewRegister->bookTest->dateOfBirth }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $viewRegister->bookTest->gender }}</div>
                          </td>

                          <td class="table-text">
                              <div>{{ $viewRegister->bookTest->email }}</div>
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
