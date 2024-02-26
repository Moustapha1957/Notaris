  <?php 
include'nav.php';
 ?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="imperis.com">

        <title>MON MOTAIRE</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">   
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> </script>  
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >  

   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" type="text/css"
 href="stylet.css">



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <body>  

<div class="container"> 
  <div class="row py-5">  
    <div class="col-12">  
        <div class="row">
<div class="col-sm-6">
<h2></h2>
</div>
<div class="col-sm-6">
    

<<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<form>
<div class="modal-header">
<h4 class="modal-title">Add Employee</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" required>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" required>
</div>
<div class="form-group">
<label>Address</label>
<textarea class="form-control" required></textarea>
</div>
<div class="form-group">
<label>Phone</label>
<input type="text" class="form-control" required>
</div>
</div>
<div class="modal-footer">
<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<input type="submit" class="btn btn-success" value="Add">
</div>
</form>
</div>
</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<form>
<div class="modal-header">
<h4 class="modal-title">Edit Employee</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" required>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" required>
</div>
<div class="form-group">
<label>Address</label>
<textarea class="form-control" required></textarea>
</div>
<div class="form-group">
<label>Phone</label>
<input type="text" class="form-control" required>
</div>
</div>
<div class="modal-footer">
<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<input type="submit" class="btn btn-info" value="Save">
</div>
</form>
</div>
</div>
</div>

</div>
</div>

      <table id="example" class="table table-hover responsive nowrap" style="width:100%">  
        <thead>  
        <h2> Client <b>Sous Dossiers</b> 
        <a href="#deleteEmployeeModal" class="btn btn-danger" style="margin-left: 600px"data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Profil</span></a>
        <a href="#addEmployeeModal" class="btn btn-success" style="margin-left:10px"data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Sous Dossiers</span></a></h2> 
          <tr>  
            <th>Client Name</th>  
            <th>Phone Number</th>  
            <th>Profession</th>  
            <th>Date of Birth</th>  
            <th>App Access</th>  
            <th>Actions</th>  
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td>  
              <a href="#">  
                <div class="d-flex align-items-center">  
                  <div class="avatar avatar-blue mr-3">EB</div>  
  
                  <div class="">  
                    <p class="font-weight-bold mb-0"> Ram </p>  
                    <p class="text-muted mb-0">ram@example.com</p>  
                  </div>  
                </div>  
              </a>  
            </td>  
            <td>(784) 667 8768</td>  
            <td>Designer</td>  
            <td>09/04/1996</td>  
            <td>  
              <div class="badge badge-success badge-success-alt">Enabled</div>  
            </td>  
            <td>  
              <div class="dropdown">  
                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                      <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"  
                        title="Actions"></i>  
                    </button>  
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">  
                  <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>  
                  <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>  
                </div>  
              </div>  
            </td>  
          </tr>  
          <tr>  
            <td>  
              <a href="#">  
                <div class="d-flex align-items-center">  
                  <div class="avatar avatar-pink mr-3">JR</div>  
                  <div class="">  
                    <p class="font-weight-bold mb-0">Richa</p>  
                    <p class="text-muted mb-0">richa_89@example.com</p>  
                  </div>  
                </div>  
              </a>  
            </td>  
            <td> (937) 874 6878</td>  
            <td> Banker</td>  
            <td>13/01/1989</td>  
            <td>  
              <div class="badge badge-success badge-success-alt">Enabled</div>  
            </td>  
            <td>  
              <div class="dropdown">  
                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                      <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"  
                        title="Actions"></i>  
                    </button>  
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">  
                  <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>  
                  <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>  
                </div>  
              </div>  
            </td>  
          </tr>  
        </tbody>  
      </table>  
    </div>  
  </div>  
</div>  
<div class="container text-center">  
  <div class="row py-5">  
    <div class="col-12">  




<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<form>
<div class="modal-header">
<h4 class="modal-title">Delete Employee</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
<p>Are you sure you want to delete these Records?</p>
<p class="text-warning"><small>This action cannot be undone.</small></p>
</div>
<div class="modal-footer">
<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<input type="submit" class="btn btn-danger" value="Delete">
</div>
</form>
</div>
</div>
</div>
  </div>  
  </div>  
</div>  
<script>  
$(document).ready(function() {  
  $("#example").DataTable({  
    aaSorting: [],  
    responsive: true,  
    columnDefs: [  
      {  
        responsivePriority: 1,  
        targets: 0  
      },  
      {  
        responsivePriority: 2,  
        targets: -1  
      }  
    ]  
  });  
  $(".dataTables_filter input")  
    .attr("placeholder", "Search here...")  
    .css({  
      width: "300px",  
      display: "inline-block"  
    });  
  $('[data-toggle="tooltip"]').tooltip();  
});  
</script>  
</body>  
</html>  