<?php

    class QueryBuilder {
        public function postQuery($condition){
            if($condition == "post/insert"){
                $sql = "insert into users values(default, :fname, :lname, :course, current_timestamp)";
                return $sql;
            }
        }

        public function fetchQuery($condition){
            if($condition == "fetch/user"){
                $sql = "select * from users";
                return $sql;
            }
        }

        public function updateQuery($condition){
            if($condition == "update/user"){
                $sql = "update users set firstname = :fname, lastname = :lname, course = :course where id = :id";
                return $sql;
            }
        }

        public function deleteQuery($condition){
            if($condition === "delete/user"){
                $sql = "delete from users where id = :id";
                return $sql;
            }
        }
    }