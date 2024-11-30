<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (strlen($_SESSION['user_id']) == 0) {
    header('location:../login.php');
} else {
    if (isset($_POST['update'])) {
        $form_id = $_GET['user_upd']; 
        $status = $_POST['status'];
        $remark = $_POST['remark'];

        
        $updateStatusQuery = "UPDATE users_orders SET status='$status' WHERE o_id='$form_id'";
        $result = mysqli_query($db, $updateStatusQuery);

        if ($result) {
          
            $insertRemarkQuery = "INSERT INTO remark(frm_id, status, remark) VALUES ('$form_id', '$status', '$remark')";
            mysqli_query($db, $insertRemarkQuery);

            echo "<script>alert('Form Details Updated Successfully');</script>";
        } else {
            echo "<script>alert('Error updating status');</script>";
        }
    }

    $sql = "SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='" . $_GET['user_upd'] . "'";
    $query = mysqli_query($db, $sql);
    $rows = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<style type="text/css" rel="stylesheet">

.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}


table { 
	width: 650px; 
	border-collapse: collapse; 
	margin: auto;
	margin-top:50px;
	}


tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #004684; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	}
	</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>View Order</title>
    <!-- Bootstrap CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- JavaScript function for popup window -->
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;
        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+1000+',height='+1000+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
        }
    </script>
</head>

<body class="fix-header fix-sidebar">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">
    <?php include('admin-header.php'); ?>

        <?php include('admin-sidebar.php'); ?>

    
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-outline-primary h-100">
                    <div class="card-header" style="background-color: #2f3d4a;margin-bottom: -70px;">
                        <h4 class="m-b-0 text-white">View Order</h4>
                    </div>
                    <div class="table-responsive m-t-20">
                        <table id="myTable" class="table table-bordered table-striped">
                            <tbody>
                                    <?php
                                        $sql = "SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='" . $_GET['user_upd'] . "'";
                                        $query = mysqli_query($db, $sql);
                                        $rows = mysqli_fetch_array($query);
                                    ?>

                                   <form name="updateOrderForm" id="updateOrderForm" method="post">
    <table class="table table-bordered table-striped">
                                 
                                    <tr>
                                        <td><strong>Name:</strong></td>
                                        <td><center><?php echo $rows['f_name'] . ' ' . $rows['l_name']; ?></center></td>
                                    </tr>

                                    <tr>
                                        <td><strong>Phone Number:</strong></td>
                                        <td><center><?php echo $rows['phone']; ?></center></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email:</strong></td>
                                        <td><center><?php echo $rows['email']; ?></center></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Quantity:</strong></td>
                                        <td><center><?php echo $rows['quantity']; ?></center></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Price:</strong></td>
                                        <td><center>₱<?php echo $rows['price']; ?></center></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Price:</strong></td>
                                        <td><center>₱<?php echo number_format($rows['quantity'] * $rows['price'], 2); ?></center></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address:</strong></td>
                                        <td><center><?php echo $rows['address']; ?></center></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date:</strong></td>
                                        <td><center><?php echo $rows['date']; ?></center></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <?php 
                                            $status = $rows['status'];
                                            if ($status == "" or $status == "NULL") {
                                        ?>
                                            <td><center><span class="badge badge-custom"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</span></center></td>
                                        <?php 
                                            } elseif ($status == "in process") {
                                        ?>
                                            <td><center><span class="badge badge-custom"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</span></center></td>
                                        <?php
                                            } elseif ($status == "closed") {
                                        ?>
                                            <td><center><span class="badge badge-custom"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</span></center></td>
                                        <?php 
                                            } elseif ($status == "rejected") {
                                        ?>
                                            <td><center><span class="badge badge-custom"><span class="fa fa-close" aria-hidden="true"></span> Cancelled</span></center></td>
                                        <?php 
                                            } 
                                        ?>																							
                                    </tr>  
                                    
                                       </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form name="updateOrderForm" id="updateOrderForm" method="post">
                    <div class="card card-outline-primary h-100">
                        <div class="card-header" style="background-color: #2f3d4a;">
                            <h4 class="m-b-0 text-white">Update Order Status</h4>
                        </div>
                        <div style="margin-left: 20px;">
                            <table class="table table-bordered table-striped">
                               <tr>
                                      <td><strong>Form ID:</strong></td>
                                      <td style="text-align: ;"><?php echo htmlentities($rows['o_id']); ?></td>
                                  </tr>
                                    <td><b>Status</b></td>
                                    <td>
                                        <select name="status" id="statusSelect" required="required" onchange="updateMessage()">
                                            <option value="">Select Status</option>
                                            <option value="in process">On the way</option>
                                            <option value="closed">Delivered</option>
                                            <option value="rejected">Cancelled</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Message</b></td>
                                    <td><textarea name="remark" id="messageTextArea" cols="50" rows="5" required="required"></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                       <input type="submit" name="update" class="btn btn-primary" value="Submit">
                                                </td>
                                </tr>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                   
                               
                          
                        </form>
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
    <script src="js/lib/datatables/datatables-init.js"></script>

   <script>
    function updateMessage() {
        var statusSelect = document.getElementById("statusSelect");
        var messageTextArea = document.getElementById("messageTextArea");

        switch (statusSelect.value) {
            case "in process":
                messageTextArea.value = "Your order is on the way.";
                break;
            case "closed":
                messageTextArea.value = "Your order has been delivered successfully.";
                break;
            case "rejected":
                messageTextArea.value = "Unfortunately, your order has been cancelled.";
                break;
            default:
                messageTextArea.value = ""; // Clear the message if no status is selected
                break;
        }
    }
</script>
</body>
</html>
<?php } ?>