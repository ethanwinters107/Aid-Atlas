<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Aid Atlas - Applications</title>
</head>
<body>
    <header>
        <h1>Aid Atlas - Applications</h1>
        <nav>
            <button onclick="location.href='index.php'">Home</button>
            <button onclick="location.href='beneficiaries.php'">Beneficiaries</button>
            <button onclick="location.href='programs.php'">Programs</button>
            <button onclick="location.href='volunteers.php'">Volunteers</button>
        </nav>
    </header>
    <main>
        <h2>Applications List</h2>
        <table>
            <tr>
                <th>Application ID</th>
                <th>Beneficiary ID</th>
                <th>Program ID</th>
                <th>Application Date</th>
                <th>Status</th>
            </tr>
            <?php
            $query = "SELECT application_id, beneficiary_id, program_id, application_date, status FROM Applications";
            $stid = oci_parse($conn, $query);
            oci_execute($stid);

            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['APPLICATION_ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['BENEFICIARY_ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['PROGRAM_ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['APPLICATION_DATE']) . "</td>";
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