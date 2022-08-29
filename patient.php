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

    $id = $_GET['id'];
    $first = '';
    $last = '';
    $address = '';
    $age = '';
    $birthdate = '';
    $contact = '';
    $medcon = '';
    $meds = '';
    $frame = '';
    $lens = '';
    $occupation = '';
    $refer = '';
    if($connect){
        $sql = "SELECT * from patientdata where is_active = 1 and id = $id";
        $result = mysqli_query($connect, $sql);
    
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Patient's Information Page</title>
</head>
<body id="body">
    <div class="container">
        <br>
        <div class="row">
            <div class="col text-center">
                <h3>Patient's Information</h3>
            </div>
        </div><br><hr><br>
        <div class="row">
            <div class="col-md-3 text-end">
                <p>Firstname: </p>
                <p>Lastname: </p>
                <p>Address: </p>
                <p>Age: </p>
                <p>Birthdate: </p>
                <p>Contact Number: </p>
            </div>
            <div class="col-md-3">
                <?php
                    if(mysqli_num_rows($result) > 0){
                        while($res = mysqli_fetch_assoc($result)){
                            echo "<p>".$res['fname']."</p>";
                            echo "<p>".$res['lname']."</p>";
                            echo "<p>".$res['address']."</p>";
                            echo "<p>".$res['age']."</p>";
                            echo "<p>".$res['birthdate']."</p>";
                            echo "<p>".$res['contact_number']."</p>";
                            
                ?>
            </div>
            <div class="col-md-3 text-end">
                <p>Medical Condition: </p>
                <p>Medication: </p>
                <p>Frame: </p>
                <p>Lens: </p>
                <p>Occupation: </p>
                <p>Date Added: </p>
                <p>Referred by: </p>
            </div>
            <div class="col-md-3">
                <?php
                            echo "<p>".$res['medical_condition']."</p>";
                            echo "<p>".$res['medications']."</p>";
                            echo "<p>".$res['frame']."</p>";
                            echo "<p>".$res['lens']."</p>";
                            echo "<p>".$res['occupation']."</p>";
                            echo "<p>".$res['date_created']."</p>";
                            echo "<p>".$res['referred_by']."</p>";

                            $first = $res['fname'];
                            $last = $res['lname'];
                            $address = $res['address'];
                            $age = $res['age'];
                            $birthdate = $res['birthdate'];
                            $contact = $res['contact_number'];
                            $medcon = $res['medical_condition'];
                            $meds = $res['medications'];
                            $frame = $res['frame'];
                            $lens = $res['lens'];
                            $occupation = $res['occupation'];
                            $refer = $res['referred_by'];
                        }
                    }
                }
                ?>
            </div>
        </div><br>
        <div class="d-flex justify-content-end">
            <button type="button" id="edit" data-bs-toggle="modal" data-bs-target="#updateModal" class="btn btn-primary" style="margin-right:10px"><span class="fa fa-edit"></span> Edit</button>
            <button type="button" id="download" class="btn btn-success"><span class="fa fa-download"></span> Download</button>
        </div><br>
        <div class="text-end">
            <a href="mainpage.php" style="text-decoration: none; font-weight: bold"><span class="fa fa-arrow-left"></span> Return to Main Page</a>
        </div>
    </div>
    <!--Add Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Patient Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="patient.php" style="padding: 10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="first" name="first" placeholder="Firstname" value="<?=$first?>" required/>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="last" name="last" placeholder="Lastname" value="<?=$last?>" required/>
                        </div>
                    </div><br>
                    <input class="form-control" type="text" id="address" name="address" placeholder="Address" value="<?=$address?>" required/><br>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="number" id="age" name="age" placeholder="Age" value="<?=$age?>" required/>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="number" id="contact" name="contact" placeholder="Contact Number" value="<?=$contact?>" required/>
                        </div>
                    </div><br>
                    <select class="form-control" id="med" name="medical">
                        <option selected disabled>Medical Condition</option>
                        <option value="Diabetes">Diabetes</option>
                        <option value="Hypertension">Hypertension</option>
                        <option value="Others">Others</option>
                    </select><br>
                    <input class="form-control" id="others" type="text" name="Others" placeholder="Please specify Medical Condition....."/><hr><br>
                    <input class="form-control" type="text" id="medications" name="medications" placeholder="Medications" value="<?=$meds?>" required/><br>
                    <input class="form-control" type="text" id="frame" name="frame" placeholder="Frame" value="<?=$frame?>" required/><br>
                    <select class="form-control" id="len" name="lens">
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
                    <input class="form-control" type="date" id="birthdate" name="birthdate" placeholder="Birthday" value="<?=$birthdate?>" required/><br>
                    <input class="form-control" type="text" id="occupation" name="occupation" placeholder="Occupation" value="<?=$occupation?>" required/><br>
                    <input class="form-control" type="text" id="referred" name="referred" placeholder="Referred by" value="<?=$refer?>" required/><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="update" name="edit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#others').hide();
            $('#others2').hide();
        });

        $('#update').click(function(){
            var id = <?=$id?>;
            var first = $('#first').val();
            var last = $('#last').val();
            var address = $('#address').val();
            var age = $('#age').val();
            var contact = $('#contact').val();
            var medical = $('#med').val();
            var medications = $('#medications').val();
            var frame = $('#frame').val();
            var lens = $('#len').val();
            var birth = $('#birthdate').val();
            var occupation = $('#occupation').val();
            var referred = $('#referred').val();
            var others = $('#others').val();
            var others2 = $('#others').val();
            
            if(medical == "Others"){
                    medical = others;
            }
            if(lens == "Others2"){
                lens = others2;
            }

            if(medical != null && lens != null){
                $.ajax({
                    url:"mainlogic.php",
                    method:"POST",
                    data:{
                        actID: 2,
                        id: id, 
                        first: first,
                        last: last,
                        address: address,
                        age: age,
                        contact: contact,
                        medical: medical,
                        medications: medications,
                        frame: frame,
                        lens: lens,
                        birth: birth,
                        occupation: occupation,
                        referred: referred,
                    },
                    success:function(data)
                    {
                        alert("Update Successful");
                        location.replace('patient.php?id=<?=$id?>');
                    }
                });
            }else{
                if(medical != null && lens == null){
                    $.ajax({
                        url:"mainlogic.php",
                        method:"POST",
                        data:{
                            actID: 3,
                            id: id, 
                            first: first,
                            last: last,
                            address: address,
                            age: age,
                            contact: contact,
                            medical: medical,
                            medications: medications,
                            frame: frame,
                            birth: birth,
                            occupation: occupation,
                            referred: referred,
                        },
                        success:function(data)
                        {
                            alert("Update Successful");
                            location.replace('patient.php?id=<?=$id?>');
                        }
                    });
                }else if(medical == null && lens != null){
                    $.ajax({
                        url:"mainlogic.php",
                        method:"POST",
                        data:{
                            actID: 4,
                            id: id, 
                            first: first,
                            last: last,
                            address: address,
                            age: age,
                            contact: contact,
                            medications: medications,
                            frame: frame,
                            lens: lens,
                            birth: birth,
                            occupation: occupation,
                            referred: referred,
                        },
                        success:function(data)
                        {
                            alert("Update Successful");
                            location.replace('patient.php?id=<?=$id?>');
                        }
                    });
                }else{
                    $.ajax({
                        url:"mainlogic.php",
                        method:"POST",
                        data:{
                            actID: 5,
                            id: id, 
                            first: first,
                            last: last,
                            address: address,
                            age: age,
                            contact: contact,
                            medications: medications,
                            frame: frame,
                            birth: birth,
                            occupation: occupation,
                            referred: referred,
                        },
                        success:function(data)
                        {
                            alert("Update Successful");
                            location.replace('patient.php?id=<?=$id?>');
                        }
                    });
                }
            }
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

        $('#download').click(function(){
            var doc = new jsPDF();
            var source = $('#body').html();
            doc.fromHTML(source, 15, 15, { width: 180 })
            doc.save('patientinfo.pdf')
        });
    </script>
</body>
</html>