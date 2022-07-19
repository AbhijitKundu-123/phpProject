<?php
include("students.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
    <tr class="text-left border-b-2 border-gray-300">
    <th class="px-4 py-3">Action</th>
    <th class="px-4 py-3">Id</th>
    <th class="px-4 py-3">Firstname</th>
    <th class="px-4 py-3">Lastname</th>
    <th class="px-4 py-3">Age</th>
    <th class="px-4 py-3">Gender</th>
    <th class="px-12 py-3">Email_Id</th>
    <th class="px-4 py-3">Mobile Number</th>
    <th class="px-4 py-3">Address</th>
    </tr>
    <?php
    $editable=new student();
    $resultval=$editable->getallval();
    if(count($resultval)>0)
    {
        foreach($resultval as $key=>$value)
        {
            echo '<tr class="bg-gray-100 border-b border-gray-200">';
            echo '<td class="px-4 py-3"><a class="text-blue-500" href="student_edit.php?id='.$value['id'].'">Edit</a></td>';
            echo '<td class="px-4 py-3">'.$value['id'].'</td>';
            echo '<td class="px-4 py-3">'.$value['firstname'].'</td>';
            echo '<td class="px-4 py-3">'.$value['lastname'].'</td>';
            echo '<td class="px-4 py-3">'.$value['age'].'</td>';
            echo '<td class="px-4 py-3">'.$value['gender'].'</td>';
            echo '<td class="px-4 py-3">'.$value['email_id'].'</td>';
            echo '<td class="px-4 py-3">'.$value['phone_no'].'</td>';
            echo '<td class="px-4 py-3">'.$value['addrs'].'</td>';
            echo '</tr>';
        }
    }
    else
    {
        echo '<tr class="bg-gray-100 border-b border-gray-200">';
        echo '<td class="px-4 py-3" callspan="9">0 results</td>';
        echo '</tr>';
    }


    ?>
    </table>
    
</body>
</html>