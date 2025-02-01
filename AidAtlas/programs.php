<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Aid Atlas - Programs</title>
</head>
<body>
    <header>
        <h1>Aid Atlas - Programs</h1>
        <nav>
            <button onclick="location.href='index.php'">Home</button>
            <button onclick="location.href='beneficiaries.php'">Beneficiaries</button>
            <button onclick="location.href='volunteers.php'">Volunteers</button>
            <button onclick="location.href='applications.php'">Applications</button>
        </nav>
    </header>
    <main>
        <h2>Programs List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Program Name</th>
                <th>Description</th>
                <th>Income Limit</th>
                <th>Budget</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
            <?php
            $query = "SELECT program_id, program_name, description, income_limit, budget, start_date, end_date, status FROM Programs";
            $stid = oci_parse($conn, $query);
            oci_execute($stid);

            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['PROGRAM_ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['PROGRAM_NAME']) . "</td>";
                echo "<td>" . htmlspecialchars($row['DESCRIPTION']) . "</td>";
                echo "<td>" . htmlspecialchars($row['INCOME_LIMIT']) . "</td>";
                echo "<td>" . htmlspecialchars($row['BUDGET']) . "</td>";
                echo "<td>" . htmlspecialchars($row['START_DATE']) . "</td>";
                echo "<td>" . htmlspecialchars($row['END_DATE']) . "</td>";
                echo "<td>" . htmlspecialchars($row['STATUS']) . "</td>";
                echo "</tr>";
            }
            oci_free_statement($stid);
            ?>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Aid Atlas. All rights reserved.</p>
    </footer>
</body>
</html>