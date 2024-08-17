<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gupter:wght@400;500;700&family=Jersey+10&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div id="mother">
        <form method="post" action="connection.php">
            <aside>
                <div>
                    <img src="schoolLogo.jpeg" alt="logo">
                    <h3>Administration panel</h3>
                    <label for="stdId">Student ID: </label><br>
                    <input type="number" name="id" id="id"><br>
                    <label for="stdName">Student Name: </label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="stdAdd">Student Address: </label><br>
                    <input type="text" name="address" id="address"><br><br>
                    <button name="add">Add</button>
                    <button name="delete">Delete</button>
                </div>
            </aside>
            <main>
                <table id="tbl">
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Student Address</th>
                    </tr>
                    <?php
                    require ('connection.php');
                    $sql = "SELECT * FROM students";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
                        echo "<tr><td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['address'] . "</td></tr>"; 
                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>