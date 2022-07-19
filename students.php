<?php
include("db_configaration.php");
Class student{
    public $firstname;
    public $lastname;
    public $age;
    public $gender;
    public $email;
    public $ph_number;
    public $add;
    public function create($stud)
    {
        $result_val=["success","error"];
        $conn=mysqli_connect(db_configaration::location, db_configaration::username, db_configaration::password, db_configaration::db_name);
        if(!$conn)
        {
            die("connection failed: ".mysqli_connect_error());
        }
        $sql="INSERT INTO students (firstname,lastname,age,gender,email_id,phone_no,addrs)
        VALUES ('".$stud->firstname."', '".$stud->lastname."', '".$stud->age."', '".$stud->gender."', '".$stud->email."', '".$stud->ph_number."', '".$stud->add."')";
        if(mysqli_query($conn, $sql))
        {
            $result_val["success"]="New record created sucessfully";
        }
        else{
            $result_val['error']="Error:".$sql."<br>".mysqli_error($conn);
        }
        mysqli_close($conn);
        return $result_val;
    }
    public function getallval()
    {
        $conn=mysqli_connect(db_configaration::location, db_configaration::username, db_configaration::password, db_configaration::db_name);
        if(!$conn)
        {
            die("connection failed: ".mysqli_connect_error());
        }
        $sql="SELECT * FROM students";
        $result=mysqli_query($conn, $sql);
        $studnt=array();
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $studnt[]=$row;
            }
        }
        mysqli_close($conn);
        return $studnt;
        
    }
    public function student_getid($id)
    {
        $conn=mysqli_connect(db_configaration::location, db_configaration::username, db_configaration::password, db_configaration::db_name);
        if(!$conn)
        {
            die("connection failed: ".mysqli_connect_error());
        }
        $sql="SELECT * FROM students WHERE id='$id'";
        $result=mysqli_query($conn, $sql);
        $studnt=array();
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $studnt[]=$row;
            }
        }
        mysqli_close($conn);
        return $studnt;
    }
    public function update_val($stud,$id,$student_val)
    {
        $result_val=["success","error"];
        $conn=mysqli_connect(db_configaration::location, db_configaration::username, db_configaration::password, db_configaration::db_name);
        if(!$conn)
        {
            die("connection failed: ".mysqli_connect_error());
        }
        $sql="UPDATE students SET `firstname`='".$stud->firstname."', `lastname`='".$stud->lastname."',`age`='".$stud->age."',`gender`='".$stud->gender."',`email_id`='".$stud->email."',`phone_no`='".$stud->ph_number."',`addrs`='".$stud->add."' WHERE `id`='".$id."'";
        if(mysqli_query($conn, $sql))
        {
            $result_val["success"]="Data update sucessfully";
        }
        else{
            $result_val['error']="Error:".$sql."<br>".mysqli_error($conn);
        }
        mysqli_close($conn);
        return $result_val;
    }
    public function mobileno_isexist($value)
    {
        
        $conn=mysqli_connect(db_configaration::location, db_configaration::username, db_configaration::password, db_configaration::db_name);
        if(!$conn)
        {
            die("connction failed:".mysqli_connect_error());
        }
        $sql="SELECT COUNT(phone_no) AS uniquephonenumber FROM students WHERE phone_no='$value'";
        $result=mysqli_query($conn,$sql);
        $totalmobno = mysqli_fetch_object($result) ;
        mysqli_close($conn);
        // echo($totalmobno->uniquephonenumber);
        if($totalmobno->uniquephonenumber!=0)
        {
            return true;

        }
        else{
            return false;
        }
        // echo($totalmobno->uniquephonenumber);
        // $mobile_no['mno']=$totalmobno->uniquephonenumber;
        // $mobile_no=[];
        // if(mysqli_num_rows($result)>0)
        // {
        //     while($row=mysqli_fetch_assoc($result))
        //     {
        //         $mobile_no[]=$row;
        //     }
        // }
        // var_dump($mobile_no);
        
        // return $mobile_no;
    }
}

?>