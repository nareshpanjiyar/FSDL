<?php
include 'db.php';

// GET ID FROM URL
$id = $_GET['id'];

// FETCH OLD DATA
$result = mysqli_query($conn, "SELECT * FROM student WHERE id=$id");
$row = mysqli_fetch_assoc($result);

// UPDATE DATA
if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];

    // mobile validation (10 digits)
    if(!preg_match('/^[0-9]{10}$/', $mobile)){
        echo "<script>alert('Mobile must be 10 digits');</script>";
    } 
    else {

        $sql = "UPDATE student SET 
                name='$name',
                email='$email',
                mobile='$mobile',
                department='$department'
                WHERE id=$id";

        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Data Updated'); window.location='index.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">
    
    Name: 
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <br><br>

    Email: 
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
    <br><br>

    Mobile: 
    <input type="text" name="mobile" 
           value="<?php echo $row['mobile']; ?>" 
           pattern="[0-9]{10}" maxlength="10" required>
    <br><br>

    Department: 
    <input type="text" name="department" value="<?php echo $row['department']; ?>" required>
    <br><br>

    <input type="submit" name="update" value="Update">

</form>

</body>
</html>