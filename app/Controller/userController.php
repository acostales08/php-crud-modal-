<?php

include_once("../Database/database.php");
include_once("../Queries/queries.php");

    interface UserFunctions{
        public function postData($data);
        public function fetchData();
        public function updateData($data);
        public function deleteData($data);
    }

    class UserController extends Database implements UserFunctions{
        public function postData($data)
        {
            $sql = new QueryBuilder;
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if($this->php_prepare($sql->postQuery("post/insert"))){
                    $this->php_dynamic_handler(":fname", $data['firstname']);
                    $this->php_dynamic_handler(":lname", $data['lastname']);
                    $this->php_dynamic_handler(":course", $data['course']);
                    if($this->php_execute()){
                        $response = array(
                            "status" => "success",
                            "message" => "successfully created"
                        );
                        echo json_encode($response);
                    }else{
                        $response = array(
                            "error" => "error",
                            "message" => "cannot be inserted"
                        );
                        echo json_encode($response);
                    }
                }
            }
        }
        
        public function fetchData()
        {
            $sql = new QueryBuilder;
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->php_prepare($sql->fetchQuery("fetch/user"))){
                    $this->php_execute();
                    if($this->php_row_check()){
                        $data = $this->php_fetchAll();
                        echo json_encode($data);
                    }else{
                        $response = array(
                            "status" => 404,
                            "message" => "No record found"
                        );
                        echo json_encode($response);
                    }
                }
            }
        }

        public function updateData($data){
            $sql = new QueryBuilder;
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if($this->php_prepare($sql->updateQuery("update/user"))){
                    $this->php_dynamic_handler(":fname", $data['firstname']);
                    $this->php_dynamic_handler(":lname", $data['lastname']);
                    $this->php_dynamic_handler(":course", $data['course']);
                    $this->php_dynamic_handler(":id", $data['id'], 1);
                    if($this->php_execute()){
                        $response = array(
                            "status" => "success",
                            "message" => "successfully updated"
                        );
                        echo json_encode($response);
                    }else{
                        $response = array(
                            "error" => "error",
                            "message" => "cannot be updated"
                        );
                        echo json_encode($response);
                    }
                }
            }

        }

        public function deleteData($data){

            $sql = new QueryBuilder;
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                if($this->php_prepare($sql->deleteQuery("delete/user"))){
                    $this->php_dynamic_handler(":id", $data['id'], 1);
                    if($this->php_execute()){
                        $response = array(
                            "status" => "success",
                            "message" => "successfully deleted"
                        );
                        echo json_encode($response);
                    }else{
                        $response = array(
                            "error" => "error",
                            "message" => "cannot be deleted"
                        );
                        echo json_encode($response);
                    }
                }
            }
        }
        
    }