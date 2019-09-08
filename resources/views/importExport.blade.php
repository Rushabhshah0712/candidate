<!doctype html>
<html lang="en">
   <head>
      <title>test</title>
     
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   </head>
   <body>
       <div style="background: linear-gradient(to right, #0066cc 0%, #ff0000 100%);">
      <div class="container">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h1 style="text-align :center">candidate upload xls file</h1>
            </div>
            <div class="panel-body">
               {{-- <a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
               <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
               <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a> --}}
               <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ url('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                  @csrf
                  @if ($errors->any())
                  <div class="alert alert-danger">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif
                  @if (Session::has('success'))
                  <div class="alert alert-success">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     <p>{{ Session::get('success') }}</p>
                  </div>
                  @endif
                  <input type="file" name="import_file" />
                  <button class="btn btn-primary" name="upload" value="upload">Import File</button>
               </form>
            </div>
         </div>
      </div>
       </div>
      {{-- datatable --}}
      <table class="table">
         <thead class="thead-dark">
            <tr>
               <th scope="col">id</th>
               <th scope="col">Full name</th>
               <th scope="col">email</th>
               <th scope="col">contact details</th>
               <th scope="col">gender</th>
               <th scope="col">Address</th>
               <th scope="col">city</th>
               <th scope="col">Higher Education</th>
               <th scope="col">Action</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
             <input type="hidden" value="{!!$count = 1!!}" />
            @foreach ($data as $value)
            <tr>
               <th scope="row">{{$count++ }}</th>
               <td>{{ $value->full_name }}</td>
               <td>{{ $value->email }}</td>
               <td>{{ $value->contect_number }}</td>
               <td>{{ $value->gender }}</td>
               <td>{{ $value->address }}</td>
               <td>{{ $value->city }}</td>
               <td>{{ $value->higher_aducation }}</td>
            {{-- <td><a  class="edit btn btn-info btn-sm view" style="color: white"  id="{{$value->id}}" data-toggle="modal" data-target="#myModal" >view</a></td> --}}
             <td>   <a  class="btn-primary btn-sm edit" style="color: white" id="{{$value->id}}" >Edit</a></td>
             <td>   <a href="candidate/{{ $value->id }}/delete"  class="edit btn3d btn-danger btn-sm">Delete</a></td>
            </tr>
            @endforeach
         </tbody>
      </table>
      {{-- {{ $data }} --}}
      {{-- data-toggle="modal" data-target="#myModal" --}}
       <!-- The Modal -->
  <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Candidate</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form action="{{ url('candidate/update') }}" method="POST">
            <div class="modal-body">
                @csrf
                <input type="text" name="full_name" value="" id="full_name" class="form-control" />
                <input type="hidden" name="id" value="" id="id" class="form-control"/>
                <input type="text" name="email" value="" id="email" class="form-control"/>
                <input type="text" name="contect_number" value="" id="contect_number" class="form-control"/>
                <input type="text" name="gender" value="" id="gender" class="form-control"/>
                <input type="text" name="address" value="" id="address" class="form-control"/>
                <input type="text" name="city" value="" id="city" class="form-control"/>
                <input type="text" name="higher_aducation" value="" id="higher_aducation" class="form-control"/>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
          </div>
        </div>
      </div>
   </body>
</html>
<script>
    $('.edit').on('click', function(){
      var id =  $(this).attr('id');
        $.ajax({
               type:'get',
               url:'candidate/'+ id +'/edit',
               success:function(data) {
                $('#myModal').modal('show');
                $('#full_name').val(data[0].full_name);
                $('#id').val(data[0].id);
                $('#email').val(data[0].email);
                $('#contect_number').val(data[0].contect_number);
                $('#gender').val(data[0].gender);
                $('#address').val(data[0].address);
                $('#city').val(data[0].city);
                $('#higher_aducation').val(data[0].higher_aducation);
               }
            });
    });
    
    
</script>