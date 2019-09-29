<?php

include "config.php";

    $condition  =   '';
    if(isset($_REQUEST['username']) and $_REQUEST['username']!=""){
        $condition  .=  ' AND username LIKE "%'.$_REQUEST['username'].'%" ';
    }
    if(isset($_REQUEST['useremail']) and $_REQUEST['useremail']!=""){
        $condition  .=  ' AND useremail LIKE "%'.$_REQUEST['useremail'].'%" ';
    }
    if(isset($_REQUEST['userphone']) and $_REQUEST['userphone']!=""){
        $condition  .=  ' AND userphone LIKE "%'.$_REQUEST['userphone'].'%" ';
    }
    $userData   =   $db->getAllRecords('users','*',$condition);
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="col-sm-12">
        <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
        <form method="get">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_REQUEST['username'])?$_REQUEST['username']:''?>" placeholder="Enter user name">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>User Email</label>
                        <input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo isset($_REQUEST['useremail'])?$_REQUEST['useremail']:''?>" placeholder="Enter user email">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>User Phone</label>
                        <input type="tel" name="userphone" id="userphone" class="form-control" value="<?php echo isset($_REQUEST['userphone'])?$_REQUEST['userphone']:''?>" placeholder="Enter user phone">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label> </label>
                        <div><button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="bg-primary text-white">
                <th>Sr#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Phone</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $s  =   '';
            foreach($userData as $val){
                $s++;
            ?>
            <tr>
                <td><?php echo $s;?></td>
                <td><?php echo $val['username'];?></td>
                <td><?php echo $val['useremail'];?></td>
                <td><?php echo $val['userphone'];?></td>
                <td align="center">
                    <a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
                    <a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>