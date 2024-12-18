<?php

    $conn = mysqli_connect("localhost", "root", "", "crud");

    if(mysqli_connect_error()){
        die("Error connecting to the databse: ".mysqli_connect_error());
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_FILES['image']) && $_FILES['image']){
            $name = $_FILES['image']['name'];
            $temp_name = $_FILES['image']['tmp_name']; 
            $folder_name = 'files/'.$name;

            $allowed_types = ['image/jpeg', 'image/png','image/gif'];
            $type = mime_content_type($temp_name);

            if(!in_array($type, $allowed_types)){
                echo "<script>alert('Please insert a valid images allowed images are jpg, png and gif imgages')</script>";

            }else{
                if(move_uploaded_file($temp_name, $folder_name)){
                    $sql = "INSERT into files (imagepath) values ('$folder_name')";

                    if(mysqli_query($conn, $sql)){
                        echo "<script>alert('Image uploaded successfully')</script>";
                    }else{
                        echo "<script>alert('An error occured')</script>";
                    }
                    
                }else{
                    echo "<script>alert('There is an error while saving the file')</script>";
                }
            }

            
        }
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image Using PHP</title>

    <style>
        body {
            background-color: #001F3F;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        form {
            margin-top: 10px;
            width: 400px;
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
            color: white;
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

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">

        <label for="image">Insert an image</label> <br>
        <input type="file" id="image" name="image"><br>
        <button id="upload_btn" type="submit">Upload Image</button>

    </form>

</body>

</html>