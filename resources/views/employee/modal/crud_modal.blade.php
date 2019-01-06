<div class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          {!! Form::hidden('idHidden', '', ['class' => 'idHidden']) !!}
        </button>
      </div>
      <div class="modal-body">
       {!! Form::open(['id' => 'form_crud']) !!}
           <div class="form-group{{ $errors->has('firstname') ? ' is-invalid' : '' }}">
            {!! Form::label('firstname', 'Firstname',['class' => 'labels d-none']) !!}
             {!! Form::text('firstname', null, ['id'=> 'fname', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Firstname']) !!}
             <small class="text-danger">{{ $errors->first('firstname') }}</small>
           </div>
           <div class="form-group{{ $errors->has('lastname') ? ' is-invalid' : '' }}">
            {!! Form::label('lastname', 'Lastname',['class' => 'labels d-none']) !!}
             {!! Form::text('lastname', null, ['id'=> 'lname', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Lastname']) !!}
             <small class="text-danger">{{ $errors->first('lastname') }}</small>
           </div>
           <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
             {!! Form::text('email', null, ['id'=> 'email', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Email']) !!}
             <small class="text-danger">{{ $errors->first('email') }}</small>
           </div>
           <div class="form-group{{ $errors->has('mobile') ? ' is-invalid' : '' }}">
            {!! Form::label('mobile', 'Mobile',['class' => 'labels d-none']) !!}
             {!! Form::number('mobile', null, ['id'=> 'mobile', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Mobile']) !!}
             <small class="text-danger">{{ $errors->first('mobile') }}</small>
           </div>
           <div class="form-group{{ $errors->has('address') ? ' is-invalid' : '' }}">
            {!! Form::label('address', 'Address',['class' => 'labels d-none']) !!}
             {!! Form::text('address', null, ['id'=> 'address', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Address']) !!}
             <small class="text-danger">{{ $errors->first('address') }}</small>
           </div>
           <div class="form-group{{ $errors->has('position') ? ' is-invalid' : '' }}">
            {!! Form::label('position', 'Position',['class' => 'labels d-none']) !!}
             {!! Form::text('position', null, ['id'=> 'position', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Position']) !!}
             <small class="text-danger">{{ $errors->first('position') }}</small>
           </div> 
           <div class="form-group{{ $errors->has('base_sal') ? ' is-invalid' : '' }}">
            {!! Form::label('base_sal', 'Basic Salary',['class' => 'labels d-none']) !!}
             {!! Form::number('base_sal', null, ['id'=> 'basicpay', 'class' => 'form-control','step' => '0.1', 'required' => 'required', 'placeholder' => 'Basic Salary']) !!}
             <small class="text-danger">{{ $errors->first('base_sal') }}</small>
           </div>
           {!! Form::submit("", ['class' => 'btn btn-outline-success float-right', 'id'=>"submit"]) !!}
       {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@section('script')
<script>
  $(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $(document).on('click', '#submit', function(e){
        e.preventDefault();
        if($('#submit').val() == 'Create'){
          $.ajax({
            url: '{{ route('employee.store') }}',
            type: 'post',
            dataType: "JSON",
            data: {
              'firstname': $('#fname').val(),
              'lastname': $('#lname').val(),
              'email':$('#email').val(),
              'mobile': $('#mobile').val(),
              'address': $('#address').val(),
              'position': $('#position').val(),
              'base_sal': $('#basicpay').val() },
            success: function(emp){
              $('#crudModal').modal('hide');  
              $('#appendToThis').prepend(
                  '<tr>' +
                    '<td id="firstItem">' + emp['firstname'] + '</td>' +
                    '<td>' + emp['email'] + '</td>' + 
                    '<td>' + emp['mobile'] + '</td>' +
                    '<td>' + emp['address'] + '</td>' +
                    '<td>' + emp['position'] + '</td>' +
                    '<td>' + emp['base_sal'] + '</td>' +
                    '<td>'+
                      '<span>'+
                        '<button id="edit-modal" class="mr-2 btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#crudModal" data-info="'+ emp['id']+ ','+ emp['firstname'] + ','+ emp['lastname'] + ','+ emp['email'] + ','+ emp['mobile'] + ','+ emp['address'] + ','+ emp['position'] + ','+ emp['base_sal'] + '" data-id="'+emp['id']+'"><i class="fa fa-pencil"></i></button>'+
                        '<button id="delete" class="btn btn-sm btn-outline-danger"  data-id="'+emp['id']+'" ><i class="fa fa-trash"></i></button>'+
                      '</span>'+
                    '</td>'+
                  '</tr>');
            }
          });
        }
        else{
          // alert('update');
          $.ajax({
            url: 'employee/' + $('.idHidden').val(),
            type: 'PUT',
            data: {
              'id': $('.idHidden').val(),
              'firstname': $('#fname').val(),
              'lastname': $('#lname').val(),
              'email':$('#email').val(),
              'mobile': $('#mobile').val(),
              'address': $('#address').val(),
              'position': $('#position').val(),
              'base_sal': $('#basicpay').val()
            },
            success: function(data){
              console.log(data);
              location.reload();  
            }
          })
        }
      });




      // Add new Emp
      $(document).on('click', '#new-emp', function() {
        $('#form_crud').show().trigger("reset");
        $('#submit').val('Create').addClass('btn-outline-success').removeClass('btn-outline-primary');
        $('.modal-title').text('New Employee');
        $('.modal-footer').addClass('d-none');
        $('.labels').addClass('d-none');
        $('#id').addClass('d-none');
        $('.modal-footer').hide()
        $('#email').show();
      });
      // Edit Existing Emp
      $(document).on('click', '#edit-modal', function() {
        $('.modal-title').text('Edit Employee');
        $('.modal-footer').addClass('d-none');
        // $('#form_crud').show();
        $('.labels').removeClass('d-none');
        $('#id').removeClass('d-none');
        $('#submit').val('Save Changes').addClass('btn-outline-primary').removeClass('btn-outline-success');
        $('.modal-footer').show()
        $('.idHidden').val($(this).data('id'));
        let empData = $(this).data('info').split(',');
        fillmodalData(empData);
      });
      
      function fillmodalData(details){
          console.log(details);
          $('#fname').val(details[1]);
          $('#lname').val(details[2]);
          $('#email').val(details[3]).hide();
          $('#mobile').val(details[4]);
          $('#address').val(details[5]);
          $('#position').val(details[6]);
          $('#basicpay').val(details[7]);
      }
      //Delete
      $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        var conf = confirm('Are you sure?');
        if (conf == true) {
          $.ajax({
              url: '{{ route('employee.destroy') }}',
              type: 'POST',
              data: {
                'id': id
              }
            })
           $(this).closest('#firstItem').remove();
        }
      });
     

  });
</script>
@stop