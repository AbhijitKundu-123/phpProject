<?php
include("students.php");
$id=$_GET['id'];
$obj=new student();
$student_val=$obj->student_getid($id);
// var_dump($student_val);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Collage form</title>
    <style>
        *{
            margin:0px;
            padding:0px;
            box-sizing:border-box;
        }
    </style>
</head>
<body>
    <?php
    // var_dump($_POST['firstname']);
$form_data=array("firstname"=>$student_val[0]['firstname'],"lastname"=>$student_val[0]['lastname'],"age"=>$student_val[0]['age'],"gender"=>$student_val[0]['gender'],"email"=>$student_val[0]['email_id'],"ph_number"=>$student_val[0]['phone_no'],"other"=>$student_val[0]['addrs']);
$data_error=array("firstname"=>"","lastname"=>"","age"=>"","gender"=>"","email"=>"","ph_number"=>"","other"=>"");
$check=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['firstname']))
    {
        if($_POST['firstname']!="")
    {
        $form_data['firstname']=$_POST['firstname'];
        if (!preg_match("/^[a-zA-Z-' ]*$/",$form_data['firstname'])) {
            $data_error['firstname'] = "Only letters and white space allowed";
            $check=true;
          }
        }
        else{
            $data_error['firstname']="please enter the Last name";
            $check=true;
        }
    }

    if(isset($_POST['lastname']))
    {
        if($_POST['lastname']!="")
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$form_data['firstname'])) {
            $data_error['lastname'] = "Only letters and white space allowed";
            $check=true;
          }
          else
          {
            $form_data['lastname']=$_POST['lastname'];
          }
        }
        else{
            $data_error['lastname']="please enter the Last name";
            $check=true;
        }
    }

    if(isset($_POST['age']))
    {
        if($_POST['age']!="")
    {
        $form_data['age']=$_POST['age'];
        }
        else{
            $data_error['age']="please enter the your date of Birth";
            $check=true;
        }
    }

    if(isset($_POST['gender']))
    {
        if($_POST['gender']!="")
    {
        $form_data['gender']=$_POST['gender'];
        }
    }
    else{
        $data_error['gender']="please enter your gender";
        $check=true;
    }

    if(isset($_POST['email']))
    {
        if($_POST['email']!="")
    {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $data_error['email'] = "Invalid email format";
            $check=true;
          }
          else{
            $form_data['email']=$_POST['email'];
          }
    }
        else{
            $data_error['email']="please enter your gender";
            $check=true;
        }
    }

    if(isset($_POST['ph_number']))
    {
        if($_POST['ph_number']!="")
    {
        $form_data['ph_number']=$_POST['ph_number'];
        }
        else{
            $data_error['ph_number']="please enter the your valid mobile number";
            $check=true;
        }
    }

    if(isset($_POST['other']))
    {
        if($_POST['other']!="")
    {
        $form_data['other']=$_POST['other'];
        }
    }
}

    if(isset($_POST['submit']))
    {
        if($check==false)
        {
            $stud=new student();
            $stud->firstname=$form_data['firstname'];
            $stud->lastname=$form_data['lastname'];
            $stud->age=$form_data['age'];
            $stud->gender=$form_data['gender'];
            $stud->email=$form_data['email'];
            $stud->ph_number=$form_data['ph_number'];
            $stud->add=$form_data['other'];
            $result=$stud->update_val($stud,$id,$student_val);
         
            if($result["success"]!="")
            {
                $change_field="";
                $field_keys=['','Firstname,','Lastname,','Date Of Birth,','Gender,','Email id,','Phone Number,','Address '];
                $student_update=$obj->student_getid($id);
                // var_dump($student_update);
                $iteam=[];
                foreach($student_val as $key=>$value)
                {
                    $iteam=array_values($value);
                }
                $iteam_update=[];
                foreach($student_update as $key_up=>$value_up)
                {
                    $iteam_update=array_values($value_up);
                }
                for($i=0;$i<count($iteam);$i++)
                {
                    if($iteam[$i]!=$iteam_update[$i])
                    {
                        $change_field=$change_field.$field_keys[$i];
                    }
                }
                $messgae='<div class="alert alert-success" role="alert">
                <p class="font-weight-bold">Message</p>
                <p>'.$change_field.$result["success"].'</p>
              </div>';
              echo $messgae;
              
            }
            else
            {
                $messgae='<div class="alert alert-danger" role="alert">
                <p class="font-weight-bold">Message</p>
                <p>'.$result["error"].'</p>
              </div>';
              echo $messgae;
            }
        }
    }
?>

<img src="netaji_subahsh.jpeg" alt="netaji subahsh" class="bg position-absolute mx-auto">
    <div class="mt-4 container shadow-sm mx-auto text-center pt-4 pb-2 bg-info">
   <h2 class="font-weight-light text-white heading_color">Welcome to Netaji Subhash Engineering College Registration form</h2>
   <p class="text-warning" style="font-size: 16px;">Enter your details and submit carefully this form to confirm your participation</p>
   <form action="" method="POST">
       <div class="d-flex flex-row justify-content-center" >
       <div>
    <label for="exampleInputEmail1" class="text-primary header">FirstName:</label>
    <input type="text" name="firstname" placeholder="Enter Your FirstName" class="p-2 border border-dark rounded" style="width:280px;margin-left:30px" value="<?php echo($form_data['firstname']);?>">
    <br><span class="text-danger"><?php echo($data_error['firstname']); ?></span>
    </div>
    <div>
    <label for="exampleInputEmail1" class="text-primary">LastName :</label>
    <input type="text" name="lastname" placeholder="Enter Your LastName" class="mr-4 p-2 border border-dark rounded" style="width:280px;margin-right:30px" value="<?php echo($form_data['lastname']);?>">
    <br><span class="text-danger"><?php echo($data_error['lastname']);?></span>
    </div>
    </div>
    <div class="text-primary mt-2" style="margin-right:226px">
    Enter your Date of Birth<input type="date" name="age" placeholder="dd-mm-yyyy" value="<?php echo($form_data['age']); ?>">
    <br><span class="text-danger"><?php echo($data_error['age']); ?></span>
    </div>
    <div class="text-primary mt-2" style="margin-right:335px">
        <span>Gender</span>
        <input type="radio" name="gender" value="male" <?php if($form_data['gender']=='male') echo('checked')?>>Male
        <input type="radio" name="gender" value="female" <?php if($form_data['gender']=='female') echo('checked')?>>Female
        <input type="radio" name="gender" value="other" <?php if($form_data['gender']=='other') echo('checked')?>>Other
        <br><span class="text-danger"><?php echo($data_error['gender']);?></span>
    </div>
    <div>
    <label for="exampleInputEmail1" class="text-primary" style="margin-right:455px;">Email Address :</label>
    <input type="text" name ="email" placeholder="please Enter your valid mail id" class="p-2 border border-dark rounded" style="width:570px" value="<?php echo($form_data['email']);?>">
    <br><span class="text-danger "><?php echo($data_error['email']);?></span>
    </div>
    <div class="mt-2">
    <label for="exampleInputMobileNumber" class="text-primary" style="margin-right:440px;">Mobile Number :</label>
        <input type="text" placeholder="Enter your Mobile Number" name="ph_number" class="p-2 border border-dark rounded" style="width:570px" value="<?php echo($form_data['ph_number']);?>">
        <br><span class="text-danger "><?php echo($data_error['ph_number']);?></span>
    </div>
    <div class="mt-2">
    <label for="exampleInputOther" class="text-primary" style="margin-right:316px">Enter Any Other Information Here :</label>
        <textarea name="other" cols="30" rows="4" placeholder='Enter any other information here' class="pl-2 border border-dark rounded" style="width:570px"><?php echo($form_data['other']) ?></textarea>
    </div>
    <div class="mt-2">
        <input type="submit" value="UPDATE" name="submit" class="p-2 bg-danger text-white border border-dark rounded" style="cursor:pointer">
    </div>
   </form>
    </div>
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>