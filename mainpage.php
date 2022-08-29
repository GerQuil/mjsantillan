<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include('connectDB.php');

    if(isset($_GET["flag"])){
        $_SESSION = array();
        session_destroy();
        unset($_SESSION);
    }

    if(isset($_SESSION["firstname"])){
        header("location: mainpage.php");
        exit;
    }
    
    if($connect){
        $sql = "SELECT * from patientdata where is_active = 1";
        $result = mysqli_query($connect, $sql);

        // Add
        if(isset($_POST['save'])){
            $first = $_POST['first'];
            $last = $_POST['last'];
            $address = $_POST['address'];
            $age = $_POST['age'];
            $contact = $_POST['contact'];
            $medical = $_POST['medical'];
            $medications = $_POST['medications'];
            $frame = $_POST['frame'];
            $lens = $_POST['lens'];
            $birthdate = $_POST['birthdate'];
            $occupation = $_POST['occupation'];
            $referred = $_POST['referred'];
            $others = $_POST['Others'];
            $others2 = $_POST['Others2'];
            $date = date('Y/m/d');

            if($others != '' || $others != NULL){
                $medical = $others;
            }
            if($others2 != '' || $others2 != NULL){
                $lens = $others2;
            }
            $sql = "INSERT into patientdata values ('','$first','$last','$address','$age','$contact','$medical','$medications','$frame','$lens','$date','$birthdate','$occupation','$referred','1')";
            mysqli_query($connect, $sql);

            $first = '';
            $last = '';
            $address = '';
            $age = '';
            $contact = '';
            $medical = '';
            $medications = '';
            $frame = '';
            $lens = '';
            $birthdate = '';
            $occupation = '';
            $referred = '';
            $others = '';
            $others2 = '';
            $date = '';

            header('Location: mainpage.php');
        }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="text-left col-md-6" style="margin-top: 20px; font-weight: bold; font-size: 20px">
                <p>Welcome, <span style="color: #2983e3"><?= $_SESSION["first"]." ".$_SESSION["last"]?></span></p>
            </div>
            <div class="text-right col-md-6" style="position: relative; right: -50vh; margin-top: 20px; font-weight: bold; font-size: 20px">
                <a href="logout.php" style="text-decoration: none">Logout</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 20px">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" id="add" type="button"><span class="glyphicon glyphicon-plus"></span> Add</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 20px">
                <input style ="border: 1px solid grey; border-radius: 10px; padding: 5px; width: 100vh;" type="text" name="search" id="search" onkeyup="searchFunction()" placeholder="Search...">
        
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 20px; font-weight: bold;">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th class='text-center' scope="col">Name</th>
                            <th class='text-center' scope="col">Address</th>
                            <th class='text-center' scope="col">Mobile Number</th>
                            <th class='text-center' scope="col">Frame</th>
                            <th class='text-center' scope="col">Birthdate</th>
                            <th class='text-center' scope="col">Date Added</th>
                            <th class='text-center' scope="col">View</th>
                            <th class='text-center' scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(mysqli_num_rows($result) > 0){
                                while($res = mysqli_fetch_assoc($result)){
                                    echo "<form method='POST' action='mainpage.php'>";
                                    echo "<tr>";
                                    echo "<td class='text-center'>".$res['fname']." ".$res['lname']."</td>";
                                    echo "<td class='text-center'>".$res['address']."</td>";
                                    echo "<td class='text-center'>".$res['contact_number']."</td>";
                                    echo "<td class='text-center'>".$res['frame']."</td>";
                                    echo "<td class='text-center'>".$res['birthdate']."</td>";
                                    echo "<td class='text-center'>".$res['date_created']."</td>";
                                    echo "<td class='text-center'><button type='button' name='view' class='fa fa-eye viewbut' style='color: #2983e3; border: none; background: none'  value=".$res['id']."></button></td>";
                                    echo "<td class='text-center'><button type='button' name='delete' data-bs-toggle='modal' data-bs-target='#deleteModal' class='fa fa-trash deletebut' style='color: red; border: none; background: none' value=".$res['id']."></button></td>";
                                    echo "<tr>";
                                    echo "</form>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Patient Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="mainpage.php" style="padding: 10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="first" placeholder="Firstname" required/>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="last" placeholder="Lastname" required/>
                        </div>
                    </div><br>
                    <input class="form-control" type="text" name="address" placeholder="Address" required/><br>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="number" name="age" placeholder="Age" required/>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="number" name="contact" placeholder="Contact Number" required/>
                        </div>
                    </div><br>
                    <select class="form-control" id="med" name="medical" required>
                        <option selected disabled>Medical Condition</option>
                        <option value="Diabetes">Diabetes</option>
                        <option value="Hypertension">Hypertension</option>
                        <option value="Others">Others</option>
                    </select><br>
                    <input class="form-control" id="others" type="text" name="Others" placeholder="Please specify Medical Condition....."/><hr><br>
                    <input class="form-control" type="text" name="medications" placeholder="Medications" required/><br>
                    <input class="form-control" type="text" name="frame" placeholder="Frame" required/><br>
                    <select class="form-control" id="len" name="lens" required>
                        <option selected disabled>Lens</option>
                        <option value="Ordinary">Ordinary</option>
                        <option value="Multicoated">Multicoated</option>
                        <option value="Double vision">Double Vision</option>
                        <option value="KK UNC">KK UNC</option>
                        <option value="KK MC">KK MC</option>
                        <option value="KK Process">KK Process</option>
                        <option value="KK MC Process">KK MC Process</option>
                        <option value="DVFT">DVFT</option>
                        <option value="DVFT MC">DVFT MC</option>
                        <option value="DVFT Process">DVFT Process</option>
                        <option value="DVFT MC Process">DVFT MC Process</option>
                        <option value="Others2">Others</option>
                    </select><br>
                    <input class="form-control" id="others2" type="text" name="Others2" placeholder="Please specify Lens....."/><hr><br>
                    <input class="form-control" type="date" name="birthdate" placeholder="Birthday" required/><br>
                    <input class="form-control" type="text" name="occupation" placeholder="Occupation" required/><br>
                    <input class="form-control" type="text" name="referred" placeholder="Referred by" required/><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!--Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Patient Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="mainpage.php" style="padding: 10px">
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="del" name="proceed" class="btn btn-primary">Proceed</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#others').hide();
            $('#others2').hide();
        });

        $('#med').click(function(){
            med = $('#med').val();
            if(med == "Others"){
                $('#others').show();
            }else{
                $('#others').hide();
            }
        });

        $('#len').click(function(){
            lens = $('#len').val();
            if(lens == "Others2"){
                $('#others2').show();
            }else{
                $('#others2').hide();
            }
        });

        $('.deletebut').click(function(){
            id = $(this).val();
            $('#del').click(function(){
                $.ajax({
                    url:"mainlogic.php",
                    method:"POST",
                    data:{
                        actID: 1,
                        id: id,        
                    },
                    success:function(data)
                    {
                        alert("Deletion Successful");
                        location.replace('mainpage.php');
                    }
                });
            });
        });
        
        $('.viewbut').click(function(){
            id = $(this).val();
            location.replace('patient.php?id='+id);
        });
    </script>
    <script>
        function searchFunction(){
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>