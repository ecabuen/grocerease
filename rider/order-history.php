<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrocerEase - Order History</title>
    <link href="img/grlogo.png" rel="icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
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
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .filters input,
        .filters select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
        }

        .filters input[type="date"] {
            width: auto;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table thead th {
            text-align: left;
            background: #4CAF50;
            color: #fff;
            padding: 10px;
        }

        table tbody tr {
            transition: background-color 0.2s;
        }

        table tbody tr:hover {
            background-color: #f4f4f4;
        }

        table th,
        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .earnings {
            color: #4CAF50;
            font-weight: bold;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #999;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Order History</h2>

        <!-- Filters -->
        <div class="filters">
            <input type="text" id="search" placeholder="Search by resident name">
            <!-- <select id="statusFilter">
                <option value="">All Status</option>
                <option value="Completed">Completed</option>
            </select> -->
            <input type="date" id="dateFilter">
        </div>

        <!-- Order Table -->
        <div class="table-wrapper">
            <table id="orderTable">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Resident Name</th>
                        <th>Address</th>
                        <th>Delivery Date</th>
                        <th>Earnings</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>201</td>
                        <td>Emily Davis</td>
                        <td>789 Maple Drive</td>
                        <td>2024-12-01</td>
                        <td class="earnings">₱30.50</td>
                    </tr>
                    <tr>
                        <td>202</td>
                        <td>Michael Brown</td>
                        <td>321 Pine Street</td>
                        <td>2024-12-02</td>
                        <td class="earnings">₱45.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script>
    const searchInput = document.getElementById('search');
    const dateFilter = document.getElementById('dateFilter');
    const tableBody = document.getElementById('orderTable').getElementsByTagName('tbody')[0];

    function filterOrders() {
        const searchValue = searchInput.value.toLowerCase();
        const dateValue = dateFilter.value; // Date from the filter
        let hasVisibleRow = false;

        Array.from(tableBody.rows).forEach(row => {
            const name = row.cells[1].textContent.toLowerCase(); // Resident Name
            const date = row.cells[3].textContent.trim(); // Delivery Date

            const matchesSearch = name.includes(searchValue);
            const matchesDate = !dateValue || date === dateValue;

            // Show or hide the row based on the filters
            if (matchesSearch && matchesDate) {
                row.style.display = '';
                hasVisibleRow = true;
            } else {
                row.style.display = 'none';
            }
        });

        // Handle "No matching orders found" dynamically
        const noDataRow = document.querySelector('.no-data');
        if (!hasVisibleRow) {
            if (!noDataRow) {
                const noData = document.createElement('tr');
                noData.classList.add('no-data');
                noData.innerHTML = `<td colspan="5">No matching orders found</td>`;
                tableBody.appendChild(noData);
            }
        } else if (noDataRow) {
            noDataRow.remove();
        }
    }

    searchInput.addEventListener('input', filterOrders);
    dateFilter.addEventListener('change', filterOrders);
</script>

</body>

</html>
