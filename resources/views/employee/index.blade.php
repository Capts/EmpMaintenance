@extends('layouts.app')
@section('title', 'Employees')

@section('content')
<div class="content pt-3">
  <div class="card">
    @include('employee.modal.crud_modal')
    <div class="card-header">
        <h3 class="card-title">Employees</h3> <br>
        <button id="new-emp" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#crudModal"><i class="fa fa-plus"></i> New Employee</button>
    </div>
    <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive">
          <table id="table-emp" class="table table-striped responsive responsive">
            <thead>
            <tr>
              {{-- <th class="">id</th> --}}
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name </th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Address</th>
              <th>Position</th>
              <th>Basic pay</th>
              <th>action</th>
            </tr>
            </thead>
      
          </table>
        </div>
      </div>
    <!-- /.card-body -->
  </div>
</div>

@stop
@push('scripts')
<script>
  $(document).ready(function() {
    $('#table-emp').DataTable().destroy();
    $('#table-emp').DataTable( {
        processing: true,
        searching: false,
        serverSide: true,
        paging: true,
        order: [ 0, 'desc' ],
        ajax: '/dtAjax',
        columns: [
            {data: 'id'},
            {data: 'firstname'},
            {data: 'lastname'},
            {data: 'email'},
            {data: 'mobile'},
            {data: 'address'},
            {data: 'position'},
            {data: 'base_sal'},
            {data: 'action'},
        ],
    });
  });
</script>

@endpush