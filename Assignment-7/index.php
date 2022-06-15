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
    $sql = "SELECT * FROM studentdata";
    $retval = mysqli_query($conn, $sql);
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
             <td><button type="button" data-toggle="modal" data-target="#exampleModal"  class="btn btn-outline-success" >Add</button></td>

        </div>
    </nav>

    <!---->
    <div class="container mt-2">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">student Id</th>
                    <th scope="col">Roll No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class(FE,TE,BE)</th>
                    <th scope="col">Address</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>


                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($retval) > 0) {
                    while ($row = mysqli_fetch_assoc($retval)) {
                ?>
                        <tr>
                            <td><?php echo $row['id'] ?? ''; ?></td>
                            <td><?php echo $row['rollno']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['class']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><button type="button" data-toggle="modal" data-target="#exampleModal2"  class="btn btn-outline-success" >Update</button></td>
                            <td><button type="button" data-toggle="modal" data-target="#exampleModal1"  class="btn btn-outline-success" >Delete</button></td>
                        </tr>
                <?php  }
                } else {
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Data Not Found!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
                }
                ?>


            </tbody>
        </table>

    </div>


    <!--Add-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="Add.php" method="post">
                    <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ID:</label>
                            <input type="number" class="form-control" name="id">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Roll Number:</label>
                            <input type="number" class="form-control" name="roll">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Class:</label>
                            <input type="text" class="form-control" name="class">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <button type="submit" class="btn btn-primary" name="adminlogin">Add Student</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

     <!--update-->
     <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="update.php" method="post">
                    <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ID:</label>
                            <input type="number" class="form-control" name="id">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Roll Number:</label>
                            <input type="number" class="form-control" name="roll">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Class:</label>
                            <input type="text" class="form-control" name="class">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <button type="submit" class="btn btn-primary" name="adminlogin">Add Student</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


     <!--Delete-->
     <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="delete.php" method="post">
                    <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ID:</label>
                            <input type="number" class="form-control" name="id">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="adminlogin">Delete</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>