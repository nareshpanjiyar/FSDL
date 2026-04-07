<?php
include 'db.php';


// INSERT DATA
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];

    $sql = "INSERT INTO student (name, email, mobile, department)
            VALUES ('$name', '$email', '$mobile', '$department')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Data Inserted');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// FETCH DATA
$result = mysqli_query($conn, "SELECT * FROM student");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 40px auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        /* Form Card */
        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        input:focus {
            border-color: #4facfe;
            outline: none;
        }

        .btn {
            background: #4facfe;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background: #00c6ff;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        th {
            background: #4facfe;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #eef6ff;
        }

        a {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .edit {
            background: #28a745;
            color: white;
        }

        .delete {
            background: #dc3545;
            color: white;
        }

        .edit:hover {
            background: #218838;
        }

        .delete:hover {
            background: #c82333;
        }

    </style>
</head>

<body>

<div class="container">

    <h2>🎓 Student Management System</h2>

    <!-- FORM -->
    <div class="card">
        <form method="POST">
            <label>Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Mobile</label>
            <input type="text" name="mobile" required>

            <label>Department</label>
            <input type="text" name="department" required>

            <button type="submit" name="submit" class="btn">Add Student</button>
        </form>
    </div>

    <!-- TABLE -->
    <h2>Student Records</h2>

    <table>
        <tr>
            <th>ID</th> 
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>