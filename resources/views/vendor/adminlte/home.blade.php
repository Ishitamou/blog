@extends('adminlte::layouts.app')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="{{ asset('/js/jquery.tabledit.min.js') }}"></script>
@section('main-content')
	

		<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				
	<?php
$connect = mysqli_connect("localhost", "root", "1234", "admin");
$query = "SELECT * FROM post ORDER BY id DESC";
$result = mysqli_query($connect, $query);
?>				

			<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Publish Post</h3>
            </div>
			<form action="events.php" method="post">
            <div class="box-body">
              <input class="form-control input-lg" type="text" id="title" name="title" required="" placeholder="Post Title">
              <br>
			  <div class="form-group">
                       <textarea type="text" id="body" class="form-control"  name="body" required="" rows="3" placeholder="Post Description"></textarea>
                </div>
					  <div align="center" class="form-group">
				<button type="submit" name="register_btn" class="btn btn-success">Publish Post</button>
				<br>
            </div>
			 </div>
			
			</form>
            <!-- /.box-body -->
          </div>
												
<!------ Include the above in your HEAD tag ---------->

    <div class="container">    
        
       </div>
		
		
				
			</div>
		</div>
			<div class="container">  
   <br />  
   <br />  
   <br />  
            <div class="table-responsive">  
    <h3 align="center">Post Box</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       
       <th>title</th>
       <th>body</th>
      </tr>
     </thead>
     <tbody>
    
   
 <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["id"].'</td>
       <td>'.$row["title"].'</td>
       <td>'.$row["body"].'</td>
	   	        </tr>
			
      ';
     }
     ?>
     </tbody>
    </table>
	
   </div>  
  </div>   
  

	</div>



@endsection
<script>  
( function($) {
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'post.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'title'], [2, 'body']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
		location.reload();
       }
      }
     });
	 
 
});  
} ) ( jQuery );
 </script>