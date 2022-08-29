<?php
    session_start();
    include('connectDB.php');

    $actID = $_POST['actID'];
    if($actID == 1){
        if($connect){
            $ID = $_POST['id'];
            mysqli_select_db($connect, "mjsantillan");
            $sql = "update
                        patientdata
                    set
                        is_active = 0
                    where
                        id = $ID
                    ";

            mysqli_query($connect, $sql);
        }else{
            echo "<p>Database not accessible...</p>";
        }
    }

    if($actID == 2){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $contact = $_POST['contact'];
        $medical = $_POST['medical'];
        $medications = $_POST['medications'];
        $frame = $_POST['frame'];
        $lens = $_POST['lens'];
        $birth = $_POST['birth'];
        $occupation = $_POST['occupation'];
        $referred = $_POST['referred'];

        if($connect){
            $ID = $_POST['id'];
            mysqli_select_db($connect, "mjsantillan");
            $sql = "update
                        patientdata
                    set
                        fname = '".$first."',
                        lname = '".$last."',
                        address = '".$address."',
                        age = '".$age."',
                        contact_number = '".$contact."',
                        medical_condition = '".$medical."',
                        medications = '".$medications."',
                        frame = '".$frame."',
                        lens = '".$lens."',
                        birthdate = '".$birth."',
                        occupation = '".$occupation."',
                        referred_by = '".$referred."'
                    where
                        id = '".$ID."'
                    ";

            mysqli_query($connect, $sql);
        }else{
            echo "<p>Database not accessible...</p>";
        }
    }

    if($actID == 3){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $contact = $_POST['contact'];
        $medical = $_POST['medical'];
        $medications = $_POST['medications'];
        $frame = $_POST['frame'];
        $birth = $_POST['birth'];
        $occupation = $_POST['occupation'];
        $referred = $_POST['referred'];

        if($connect){
            $ID = $_POST['id'];
            mysqli_select_db($connect, "mjsantillan");
            $sql = "update
                        patientdata
                    set
                        fname = '".$first."',
                        lname = '".$last."',
                        address = '".$address."',
                        age = '".$age."',
                        contact_number = '".$contact."',
                        medical_condition = '".$medical."',
                        medications = '".$medications."',
                        frame = '".$frame."',
                        birthdate = '".$birth."',
                        occupation = '".$occupation."',
                        referred_by = '".$referred."'
                    where
                        id = '".$ID."'
                    ";

            mysqli_query($connect, $sql);
        }else{
            echo "<p>Database not accessible...</p>";
        }
    }

    if($actID == 4){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $contact = $_POST['contact'];
        $medications = $_POST['medications'];
        $lens = $_POST['lens'];
        $frame = $_POST['frame'];
        $birth = $_POST['birth'];
        $occupation = $_POST['occupation'];
        $referred = $_POST['referred'];

        if($connect){
            $ID = $_POST['id'];
            mysqli_select_db($connect, "mjsantillan");
            $sql = "update
                        patientdata
                    set
                        fname = '".$first."',
                        lname = '".$last."',
                        address = '".$address."',
                        age = '".$age."',
                        contact_number = '".$contact."',
                        medications = '".$medications."',
                        frame = '".$frame."',
                        lens = '".$lens."',
                        birthdate = '".$birth."',
                        occupation = '".$occupation."',
                        referred_by = '".$referred."'
                    where
                        id = '".$ID."'
                    ";

            mysqli_query($connect, $sql);
        }else{
            echo "<p>Database not accessible...</p>";
        }
    }

    if($actID == 5){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $contact = $_POST['contact'];
        $medications = $_POST['medications'];
        $frame = $_POST['frame'];
        $birth = $_POST['birth'];
        $occupation = $_POST['occupation'];
        $referred = $_POST['referred'];

        if($connect){
            $ID = $_POST['id'];
            mysqli_select_db($connect, "mjsantillan");
            $sql = "update
                        patientdata
                    set
                        fname = '".$first."',
                        lname = '".$last."',
                        address = '".$address."',
                        age = '".$age."',
                        contact_number = '".$contact."',
                        medications = '".$medications."',
                        frame = '".$frame."',
                        birthdate = '".$birth."',
                        occupation = '".$occupation."',
                        referred_by = '".$referred."'
                    where
                        id = '".$ID."'
                    ";

            mysqli_query($connect, $sql);
        }else{
            echo "<p>Database not accessible...</p>";
        }
    }
?>