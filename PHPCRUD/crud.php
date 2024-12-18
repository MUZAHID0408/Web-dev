<?php
$conn = mysqli_connect("localhost", "root", "", "crud");

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) ) {

    //inserting data into a database.
    if(isset($_POST['studentID']) && isset($_POST['studentName']) && isset($_POST['department'])){

        
    $st_id = $_POST['studentID'];
    $st_name = $_POST['studentName'];
    $dept = $_POST['department'];

    $sql = "INSERT INTO students (st_id, st_name, dept) VALUES ($st_id,'$st_name', '$dept')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data inserted')</script>";
    } else {
        echo "<script>alert('Data insertion failed')</script>";
    }

    }

    //deleting data from database

    if(isset($_POST['studentDeleteId'])){
        $st_del_id = intval($_POST['studentDeleteId']);
        $sql = "DELETE from students where st_id = $st_del_id";

        if(mysqli_query($conn, $sql)){
            echo "<script>alert('$st_del_id id Data Deleted')</script>";
        }else{
            echo "<script>alert('$st_del_id this id could not be found')</script>";
        }
    }



}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operation</title>
    <style>
        body {
            background-color: #001F3F;
            display: flex;
            justify-content: center;
            gap: 90px;

        }

        h1{
            color: #71C562;
        }

        form {
            margin-top: 10px;
            width: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form label {
            color: white;
            width: 100%;
            font-size: 22px;
        }

        form>input {
            padding: 15px 2px;
            border: none;
            border-radius: 5px;
            color: black;
            width: 100%;

        }

        form>button {
            color: white;
            font-size: 22px;
            background-color: #3A6D8C;
            padding: 10px 18px;
            margin-top: 30px;
            border: none;
            border-radius: 20px;
        }

        form>button:hover {
            background-color: #6A9AB0;
            box-shadow: 0px 0px 10px #EAD8B1;
        }
    </style>
</head>

<body>
    <div class="side1">

        <h1>Insertion Operation</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <label for="st_id">Insert Student ID: </label><br>
            <input type="number" id="st_id" name="studentID" placeholder="000000000" min="1" required><br>
            <label for="st_name">Insert Student Name: </label><br>
            <input type="text" id="st_name" name="studentName" placeholder="e.g, Karim" required><br>
            <label for="dept">Insert Department: </label><br>
            <input type="text" id="dept" name="department" placeholder="e.g, CSE" required><br>
            <button id="insert_btn">INSERT DATA</button>
        </form>
    </div>

    <div class="side2">
    <h1>Deletion Operation</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <label for="del_id">Insert ID to delete student information: </label><br>
        <input type="number" id="del_id" name="studentDeleteId" placeholder="000000000" min="1" required><br>
        <button id="del_btn">DELETE</button>
    </form>
    </div>


    


</html>
</body>