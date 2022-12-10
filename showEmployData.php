<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
     <h1 class = "text-align:center">Employ Data</h1>
     <a href = "employData.php">Add data</a>
     <div class = "container">
        <?php
            include("dataConnection.php");
            $sql = "SELECT * FROM `employ_data`";
            $result=mysqli_query($con, $sql); 
            if(mysqli_num_rows($result)>0) { ?>
                <div class = "table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>FullName</th>
                            <th>Email Id</th>
                            <th>Mobile No.</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Acction</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                    $count = 0;
                    while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                         <tr>
                            <td><?php echo ++$count;?></td>
                            <td><?php echo $data['fullname']?></td>
                            <td><?php echo $data['email']?></td>
                            <td><?php echo $data['mobile']?></td>
                            <td><?php echo $data['dateOfBirth']?></td>
                            <td><?php echo $data['gender']?></td>
                            <td><?php echo $data['address']?></td>
                            <td>
                                <form action = "deleteEmployData.php" method = "POST">
                                    <input type = "hidden" name="userid" value="<?php echo $data['userid'] ;?>"></input>
                                    <button type = "submit" onclick = "return confirm('Are you sure ?');">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href ="employData.php?id=<?php echo $data['userid']?>">Edit</a>
                            </td>
                         </tr>
                    <?php } ?>
                </tbody>
                </table>
                </div> 
            <?php } else {
                echo " Data Not Found!";
                } ?>
     </div>
</body>
</html>