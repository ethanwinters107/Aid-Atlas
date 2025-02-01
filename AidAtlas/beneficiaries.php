<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Aid Atlas - Beneficiaries</title>
</head>
<body>
    <header>
        <h1>Aid Atlas - Beneficiaries</h1>
        <nav>
            <button onclick="location.href='index.php'">Home</button>
            <button onclick="location.href='programs.php'">Programs</button>
            <button onclick="location.href='volunteers.php'">Volunteers</button>
            <button onclick="location.href='applications.php'">Applications</button>
        </nav>
    </header>
    <main>
        <h2>Beneficiaries List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Income Level</th>
                <th>Status</th>
                <th>Registration Date</th>
            </tr>
            <?php
            $query = "SELECT beneficiary_id, name, address, contact_number, income_level, status, registration_date FROM Beneficiaries";
            $stid = oci_parse($conn, $query);
            oci_execute($stid);

            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['BENEFICIARY_ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['NAME']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ADDRESS']) . "</td>";
                echo "<td>" . htmlspecialchars($row['CONTACT_NUMBER']) . "</td>";
                echo "<td>" . htmlspecialchars($row['INCOME_LEVEL']) . "</td>";
                echo "<td>" . htmlspecialchars($row['STATUS']) . "</td>";
                echo "<td>" . htmlspecialchars($row['REGISTRATION_DATE']) . "</td>";
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