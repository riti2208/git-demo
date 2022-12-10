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
    <h1 class = "text-align:center">Information</h1>
    <a href = "compney.php">Add details</a>
    <div class = "container">
    <?php
            include("dataconnection.php");
            $sql = "SELECT * FROM `information_table`";
            $result=mysqli_query($con, $sql); 
            if(mysqli_num_rows($result)>0) { ?>
            <div class = "table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Compney Name</th>
                            <th>Compney Type</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Acction</th>
                        </tr>
                    </thead>
            </div>
            <tbody> 
                <?php
                    $count = 0;
                    while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    // print_r($data);
                    // die();?>
                    <tr>
                            <td><?php echo ++$count;?></td>
                            <td><?php echo $data['compneyName']?></td>
                            <td><?php echo $data['compneyType']?></td>
                            <td><?php echo $data['compneyAddress']?></td>
                            <td> 
                                <img src = "<?php echo $data['image']?>" alt="" width = "50" hieght = "50"></img>
                            </td>
                            <td>
                                <form action = "deleteInfo.php" method = "POST">
                                    <input type = "hidden" name="id" value="<?php echo $data['id'] ;?>"></input>
                                    <button type = "submit" onclick = "return confirm('Are you sure ?');">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href ="compney.php?id=<?php echo $data['id'];?>">Edit</a>
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