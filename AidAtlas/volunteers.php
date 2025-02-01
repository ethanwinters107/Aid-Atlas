<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Aid Atlas - Volunteers</title>
</head>
<body>
    <header>
        <h1>Aid Atlas - Volunteers</h1>
        <nav>
            <button onclick="location.href='index.php'">Home</button>
            <button onclick="location.href='beneficiaries.php'">Beneficiaries</button>
            <button onclick="location.href='programs.php'">Programs</button>
            <button onclick="location.href='applications.php'">Applications</button>
        </nav>
    </header>
    <main>
        <h2>Volunteers List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Registration Date</th>
            </tr>
            <?php
            $query = "SELECT volunteer_id, name, contact_number, registration_date FROM Volunteers";
            $stid = oci_parse($conn, $query);
            oci_execute($stid);

            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['VOLUNTEER_ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['NAME']) . "</td>";
                echo "<td>" . htmlspecialchars($row['CONTACT_NUMBER']) . "</td>";
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