<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrocerEase</title>
    <link href="img/grlogo.png" rel="icon">
    <!-- FontAwesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .heading-border {
            width: 60px;
            height: 4px;
            background-color: #4CAF50;
            margin: 10px 0 30px;
        }

        .order-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .order-list li {
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            background: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .order-list li:hover {
            transform: translateY(-5px);
        }

        .order-list li .details {
            font-size: 14px;
            color: #555;
        }

        .order-list li .status {
            color: #4CAF50;
            font-weight: 600;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: left;
            position: relative;
        }

        .modal-content h3 {
            margin-top: 0;
        }

        .modal-content .close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #f4f4f4;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            font-size: 18px;
            text-align: center;
        }

        .modal-content .field {
            margin-top: 20px;
        }

        .modal-content .field label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        .modal-content .field input,
        .modal-content .field textarea,
        .modal-content .field select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .modal-content .actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .modal-content .btn {
            background: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: 600;
        }

        .modal-content .btn:hover {
            background: #45A049;
        }
    </style>

</head>

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Order Management</h2>
        <div class="heading-border"></div>

        <!-- Order List -->
        <ul class="order-list">
            <li onclick="openModal('Order #101', 'John Doe', '+1234567890', '123 Elm Street', 'Pending')">
                <span class="details">Order #101 - John Doe</span>
                <span class="status">Pending</span>
            </li>
            <li onclick="openModal('Order #102', 'Jane Smith', '+9876543210', '456 Oak Avenue', 'In Progress')">
                <span class="details">Order #102 - Jane Smith</span>
                <span class="status">In Progress</span>
            </li>
        </ul>
    </div>

    <!-- Modal -->
    <div class="modal" id="orderModal">
        <div class="modal-content">
            <button class="close" onclick="closeModal()">×</button>
            <h3 id="orderTitle">Order #101</h3>
            <p><strong>Resident Details:</strong></p>
            <p>Name: <span id="residentName">John Doe</span></p>
            <p>Contact: <span id="residentContact">+1234567890</span></p>
            <p>Address: <span id="residentAddress">123 Elm Street</span></p>

            <div class="field">
                <label for="status">Order Status</label>
                <select id="status">
                    <option value="Accepted">Accepted</option>
                    <option value="Items Purchased">Items Purchased</option>
                    <option value="Out for Delivery">Out for Delivery</option>
                    <option value="Delivered">Delivered</option>
                </select>
            </div>

            <div class="field" id="paymentFields" style="display: none;">
                <label for="totalPayment">Total Payment</label>
                <input type="text" id="totalPayment" placeholder="Enter total payment amount">
                <label for="notes">Notes (Optional)</label>
                <textarea id="notes" rows="3" placeholder="Add any additional details"></textarea>
                <button class="btn" onclick="confirmTotal()">Confirm Total</button>
            </div>

            <div class="actions">
                <button class="btn" onclick="saveChanges()">Save Changes</button>
                <button class="btn" onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(orderId, residentName, contact, address, status) {
            document.getElementById("orderTitle").innerText = orderId;
            document.getElementById("residentName").innerText = residentName;
            document.getElementById("residentContact").innerText = contact;
            document.getElementById("residentAddress").innerText = address;
            document.getElementById("status").value = status;
            document.getElementById("paymentFields").style.display = status === 'Items Purchased' ? 'block' : 'none';
            document.getElementById("orderModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("orderModal").style.display = "none";
        }

        function saveChanges() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save these changes?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4CAF50',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Saved!',
                        'Order details have been updated.',
                        'success'
                    );
                    closeModal();
                }
            });
        }

        function confirmTotal() {
            const totalPayment = document.getElementById('totalPayment').value;
            if (!totalPayment) {
                Swal.fire(
                    'Error!',
                    'Please enter a valid total payment amount.',
                    'error'
                );
                return;
            }

            Swal.fire({
                title: 'Confirm Total Payment',
                text: `The total payment is ₱${totalPayment}. Notify the resident?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4CAF50',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Confirmed!',
                        'The resident has been notified to prepare the payment.',
                        'success'
                    );
                }
            });
        }

        // Show/Hide payment fields based on status change
        document.getElementById('status').addEventListener('change', function () {
            const paymentFields = document.getElementById('paymentFields');
            paymentFields.style.display = this.value === 'Items Purchased' ? 'block' : 'none';
        });
    </script>
</body>

</html>