@extends('layouts.app')
@section('title', 'Employees')

@section('content')
<div class="content p-5">
  <div class="card">
    @include('employee.modal.crud_modal')
    <div class="card-header">
        <h3 class="card-title">Employees</h3> <br>
        <button id="new-emp" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#crudModal"><i class="fa fa-plus"></i> New Employee</button>
    </div>
    <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped responsive ">
          <thead>
          <tr>
            {{-- <th class="">id</th> --}}
            <th>name</th>
            <th>email</th>
            <th>mobile</th>
            <th>address</th>
            <th>position</th>
            <th>basic pay</th>
            <th>action</th>
          </tr>
          </thead>
          <tbody id="appendToThis">
            @foreach ($employees as $emp)
              <tr id="firstItem">
                {{-- <td> {{ $emp->id }}</td> --}}
                <td >{{ ucfirst($emp->firstname). ' '. ucfirst($emp->lastname) }}</td>
                <td>{{ ucfirst($emp->email) }}</td>
                <td>{{ ucfirst($emp->mobile) }}</td>
                <td>{{ ucfirst(str_limit($emp->address,20, '...')) }}</td>
                <td>{{ ucfirst($emp->position) }}</td>
                <td>₱ {{ number_format($emp->base_sal) }}</td>
                <td>
                  <span>
                    <button id="edit-modal" class="mr-2 btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#crudModal" data-info="{{$emp->id}},{{$emp->firstname}},{{$emp->lastname}},{{$emp->email}},{{$emp->mobile}},{{$emp->address}},{{$emp->position}},{{$emp->base_sal}}" data-id="{{$emp->id}}"><i class="fa fa-pencil"></i></button>
                    <button id="delete" class="btn btn-sm btn-outline-danger"  data-id="{{$emp->id}}"><i class="fa fa-trash"></i></button>
                  </span>
                </td>
              </tr>
            @endforeach
          
          </tbody>
          
        </table>
      </div>
    <!-- /.card-body -->
  </div>
</div>

@stop