<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrocerEase</title>
    <link href="img/grlogo.png" rel="icon">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Custom CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 20px;
        }

        .table-container {
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }

        .table-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .btn-modern {
            padding: 10px 15px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-modern:hover {
            background-color: #0056b3;
        }

        .modern-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .modern-table th,
        .modern-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .modern-table th {
            background-color: #f4f4f4;
            font-weight: bold;
            text-align: center;
        }

        .modern-table td {
            text-align: center;
        }

        .delete-row-btn {
            color: #ff4d4d;
            cursor: pointer;
            font-size: 1.2rem;
        }

        .delete-row-btn:hover {
            color: #e60000;
        }

        .submit-container {
            margin-top: 20px;
            text-align: center;
        }

        .btn-submit {
            padding: 10px 20px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="table-container">
        <div class="table-title">
            <h2>Grocery List</h2>
            <button class="btn-modern" id="add-row">Add Item</button>
        </div>
        <table class="modern-table" id="food-table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td contenteditable="true">Sample Item</td>
                    <td contenteditable="true">1</td>
                    <td><span class="delete-row-btn" onclick="deleteRow(this)">&#10060;</span></td>
                </tr>
            </tbody>
        </table>
        <div class="submit-container">
            <button class="btn-submit" id="submit-list">Submit List</button>
        </div>
    </div>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        const foodTable = document.getElementById('food-table').querySelector('tbody');
        const addRowButton = document.getElementById('add-row');
        const submitButton = document.getElementById('submit-list');

        // Add new row functionality
        addRowButton.addEventListener('click', () => {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td contenteditable="true">New Item</td>
                <td contenteditable="true">1</td>
                <td><span class="delete-row-btn" onclick="deleteRow(this)">&#10060;</span></td>
            `;
            foodTable.appendChild(newRow);
        });

        // Delete row functionality
        function deleteRow(deleteButton) {
            const row = deleteButton.closest('tr');
            row.remove();
        }

        // Submit button functionality
        submitButton.addEventListener('click', () => {
            const rows = foodTable.querySelectorAll('tr');
            const data = [];

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const itemName = cells[0].textContent.trim();
                const quantity = cells[1].textContent.trim();
                data.push({ itemName, quantity });
            });

            console.log('Submitted Data:', data); // Log data to the console for now
            alert('Grocery list submitted! Check the console for details.');
        });
    </script>
</body>

</html>