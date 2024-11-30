<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Orders</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/lib/datatables/datatables.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
    <style>
    /* Hide sorting arrows */
    .sorting:before,
    .sorting:after,
    .sorting_asc:before,
    .sorting_asc:after,
    .sorting_desc:before,
    .sorting_desc:after {
        display: none !important;
    }


    #myTable thead th {
        pointer-events: none !important;
        position: relative;
    }

    #myTable thead th::after {
        content: '';
        display: block;
        position: absolute;
        top: 50%;
        right: 8px;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid #fff;
    }
</style>



</head>

<body class="fix-header fix-sidebar">
   
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
  
    <div id="main-wrapper">
   
    <?php include('admin-header.php'); ?>
      
        <?php include('admin-sidebar.php'); ?>
    
        <div class="page-wrapper">
      
            
      
            <div class="container-fluid">
           
                <div class="row">
                    <div class="col-12">
                        
                       
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header" style="background-color: #2f3d4a;">
                                <h4 class="m-b-0 text-white">All Orders</h4>
                            </div>
                             
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                            <tr>
                                                <th>User</th>		
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total Price</th>
												<th>Address</th>
												<th>Status</th>												
												 <th>Reg-Date</th>
												  <th>Action</th>
												 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
											
											<?php
												$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id ";
												$query=mysqli_query($db,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="8"><center>No Orders</center></td>';
														}
													else
														{				
																	while($rows=mysqli_fetch_array($query))
																		{
																																							
																				?>
																				<?php
                                                                        echo '<tr>
                                                                                <td>'.$rows['username'].'</td>
                                                                                <td>'.$rows['title'].'</td>
                                                                                <td>'.$rows['quantity'].'</td>
                                                                                <td>₱'.$rows['price'].'</td>
                                                                                <td data-column="Total Price">₱'.number_format($rows['quantity'] * $rows['price'], 2).'</td>
                                                                                <td>'.$rows['address'].'</td>';
                                                                                ?>

<?php
$status = $rows['status'];
if ($status == "" || $status == "NULL") {
    ?>
    <td>
        <span class="badge " style="padding: 8px 12px; font-size: 14px;">
            <span class="fa fa-bars" aria-hidden="true"></span> Dispatch
        </span>
    </td>
    <?php
} else if ($status == "in process") {
    ?>
    <td>
        <span class="badge " style="padding: 8px 12px; font-size: 14px;">
            <span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!
        </span>
    </td>
    <?php
} else if ($status == "closed") {
    ?>
    <td>
        <span class="badge " style="padding: 8px 12px; font-size: 14px;">
            <span class="fa fa-check-circle" aria-hidden="true"></span> Delivered
        </span>
    </td>
    <?php
} else if ($status == "rejected") {
    ?>
    <td>
        <span class="badge " style="padding: 8px 12px; font-size: 14px;">
            <span class="fa fa-close" aria-hidden="true"></span> Cancelled
        </span>
    </td>
    <?php
}
?>

																						<?php																									
																							echo '	<td>'.$rows['date'].'</td>';
																							?>
																									 <td>
																									 <a href="#" onclick="confirmDelete(event, <?php echo $rows['o_id'];?>);" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>


																								<?php
																								echo '<a href="view_order.php?user_upd='.$rows['o_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
																									</td>
																									</tr>';
																					 
																						
																						
																		}	
														}
												
											
											?>
                                             
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
         
            </div>
    
        </div>
   
    </div>
    
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
    function confirmDelete(event, orderId) {
        event.preventDefault(); // Prevent default action of the link

        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to delete this order. This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `delete_orders.php?order_del=${orderId}`;
            }
        });
    }

    $(document).ready(function() {
        $('#myTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": false, 
            "columnDefs": [
                { "orderable": false, "targets": "_all" } 
            ]
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function logout() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php'; // Redirect to logout script if confirmed
            }
        });
    }
</script>


</body>

</html>