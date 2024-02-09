<?php

include('../Controller/userController.php');

    if(isset($_POST['isbool']) === true){
        $data = [
            "firstname" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "course" => $_POST['course'],
        ];
        $callback = new UserController();
        $callback->postData($data);
    }

    if(isset($_GET['fetchTrigger']) === true){
        $fetchCallBack = new UserController();
        $fetchCallBack->fetchData();
    }

    if(isset($_POST['userUpdate']) === true){
        $data = [
            "id" => $_POST['id'],        
            "firstname" => $_POST['firstname'],   
            "lastname" => $_POST['lastname'],   
            "course" => $_POST['course'],   
                
        ];

        $updateCallback = new UserController();
        $updateCallback->updateData($data);
    }

    if(isset($_POST['userDel']) === true){
        $data = [
            "id" => $_POST['id']
        ];

        $deleteCallback = new UserController();
        $deleteCallback->deleteData($data);
    }