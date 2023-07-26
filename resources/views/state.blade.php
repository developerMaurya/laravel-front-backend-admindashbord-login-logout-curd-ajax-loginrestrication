<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel-ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1 class="text-center">Laravel Ajax | Crud Operation</h1>
        <hr>
        <div class="row mt-5">
            <div class="col-6 offset-3">
                <form id="myForm" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Select state</label>
                        <select name="state_id" class="form-control">
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{ $state->state_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">City Name</label>
                        <input type="text" name="city_name" class="form-control">
                    </div>
                    
                    <button id="submit" class="btn btn-primary mt-3">Add City</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <table id="cities" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>City</th>
                            <th>State</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>   
                    <tbody >
                    </tbody>     
                </table>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update City</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    @csrf
                    
                    <!-- {{csrf_field()}} -->
                    <!-- hiddein id input filed -->
                    <input type="hidden" name="id">
                    <label for="">select state</label>
                    <select name="edit_state_id" class="form-control">
                    @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state_name}}</option>
                    @endforeach
                    </select>
                    <div class="form-group">
                        <label for="">City Name</label>
                        <input type="text" name="edit_city_name" class="form-control">
                    </div>
                    <label for="">Select Status</label>
                    <select name="edit_status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </from>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="update" class="btn btn-primary">Update City</button>

            </div>
            </div>
        </div>
        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<!-- ajax code -->
<script>
    $(document).ready(function(){
        // Insert Data
        $('#submit').click(function(e){
            e.preventDefault();
            $.ajax({
                url:"{{ url('addCity') }}",
                type:"POST",
                datatype:"json",
                data:$('#myForm').serialize(),
                success:function(response){
                    $('#myForm')[0].reset();
                    console.log(response);
                    table.ajax.reload();
                }

            });
        });
        // Display data
        
        var table=$('#cities').DataTable({
            ajax: "{{ url('getCities') }}",
            columns: [
                { "data": "city_name" },
                { "data": "state_name" },
                { 
                    "data": null ,
                    render: function(data,type,row){
                        if(row.status=="Active"){
                            return `<button class="btn btn-sm btn-success">Active</button>`;
                        }else{
                            return `<button class="btn btn-sm btn-warning">Inactive</button>`;
                        }
                    }
                },
                { 
                    "data": null ,
                    render: function(data,type,row){
                        return `<button data-id="${row.id}" class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#exampleModal" id="edit"><i class="fa fa-edit"></i></button>`; 
                    }
                },
                { 
                    "data": null ,
                    render: function(data,type,row){
                        return `<button data-id="${row.id}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></button>`; 
                    }
                },
            ]
        });
        // edit city goes here
        $(document).on('click','#edit',function(){
           $.ajax({
               url:"{{url('getCityById') }}",
               type:"post",
               dataType:'json',
               data:{
                   "_token":"{{ csrf_token() }}",
                   "id":$(this).data('id')
               },
               success:function(response){
                $('input[name="id"]').val(response.data.id);
                   $('select[name="edit_state_id"]').val(response.data.state_id);
                   $('input[name="edit_city_name"]').val(response.data.city_name);
                   $('select[name="edit_status"]').val(response.data.status);
               }
           })
        })
        // update city
        $(document).on('click', '#update', function() {
            if (confirm("Are you sure want to update ?")) {
                $.ajax({
                    url: "{{ url('updateCity') }}",
                    type: "post",
                    dataType: 'json',
                    data: $('#updateForm').serialize(),
                    success: function(response) {
                        $('#updateForm')[0].reset();
                        $('#exampleModal').modal('hide');
                        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
                        table.ajax.reload();
                    }
                });
            }
        });
        // delete city details
        $(document).on('click','#delete',function(){
            if(confirm('Are you sure want to delete ?? ')){
                $.ajax({
                    url:"{{url('deleteCityById') }}",
                    type:"post",
                    dataType:'json',
                    data:{
                        "_token":"{{ csrf_token() }}",
                        "id":$(this).data('id'),
                    },
                    success: function(response){
                        table.ajax.reload();
                    }
                });
            }
        })
        // END
    });
</script>
</body>
</html>