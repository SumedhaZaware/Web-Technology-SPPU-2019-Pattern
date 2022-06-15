<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>PHP CRUD OPERATIONS</title>
</head>

<body>

    <?php
    //for sql connection
    $host = 'localhost:3306';
    $user = 'root';
    $pass = 'root';
    $dbname = 'demo';
    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }
  
    ?>
     <!--Navbar-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-success" style="font-weight:bold;">Assignment 7</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
    
            </ul>
            

        </div>
    </nav>

    <div class="container-fluid">
        <?php
        
       
            
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['name'];
        $id = $_REQUEST['id'];
        $roll =  $_REQUEST['roll'];
        $class = $_REQUEST['class'];
        $address= $_REQUEST['address'];
    
            
        // Performing insert query execution
       
        
	    $sql = "UPDATE studetdata SET id='$id',rollno='$roll',name='$name',class='$class',address='$address' WHERE id='$id'"; 
            if(mysqli_query($conn, $sql)){  
            echo "<div class='alert alert-success' role='alert'>
        Update Successful Thank you ! 
        <a href='index.php'> <button type='submit' class='btn btn-success'>Back To Home</button></a>
        </div>";  
            }else{  
                echo "<div class='alert alert-danger' role='alert'>
            Try Again Something went wrong ! May Already Register
            <a href='Index.php'> <button type='submit' class='btn btn-success'>Back To Home</button></a>
        </div> ";  
            }  
            
        // Close connection
        mysqli_close($conn);
        ?>
    </div>











    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>