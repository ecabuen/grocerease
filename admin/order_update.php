<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

// Redirect to login if user is not logged in
if (strlen($_SESSION['user_id']) == 0) {
    header('location: ../login.php');
    exit();
}

if (isset($_POST['update'])) {
    $form_id = $_GET['form_id'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    $query = mysqli_query($db, "INSERT INTO remark (frm_id, status, remark) VALUES ('$form_id', '$status', '$remark')");
    $sql = mysqli_query($db, "UPDATE users_orders SET status='$status' WHERE o_id='$form_id'");

    if ($sql) {
        // Return a success response
        echo json_encode(['status' => 'success']);
        exit();
    } else {
        // Return an error response
        echo json_encode(['status' => 'error']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Order Update</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
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

</head>
<body>
    <div style="margin-left: 50px;">
        <form name="updateticket" id="updatecomplaint" method="post">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><b>Form Number</b></td>
                    <td><?php echo htmlentities($_GET['form_id']); ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
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
                    <td><b>Action</b></td>
                    <td>
                        <input type="submit" name="update" class="btn btn-primary" value="Submit">
                        <input name="Submit2" type="submit" class="btn btn-danger" value="Close this window" onClick="return f2();" style="cursor: pointer;" />
                    </td>
                </tr>
            </table>

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
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#updatecomplaint').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                $.ajax({
                    url: 'order_update.php?form_id=<?php echo $_GET['form_id']; ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Form Details Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            // Handle error case here
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            });
                        }
                    },
                    error: function() {
                        // Handle error case here
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>