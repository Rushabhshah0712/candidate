
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
    
    @section('main')
    
       
   @show
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