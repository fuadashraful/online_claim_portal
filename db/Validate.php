<?php

    class Validate
    {
        private $db;

        public function __construct($conn)
        {
            $this->db=$conn;
        }

        public function verify_data($username,$email,$user_type,$pass1,$pass2)
        {
            $errors=array();
            if(strlen($username)<5)
            {
                $errors[]='Username is too short';
            }
            elseif (!preg_match('/^[a-z\d]{2,64}$/i', $username))
            {
                $errors[]='Username can not contain special character';
            }
            else if(strlen($pass1)<5 || strlen($pass2)<5)
            {
                $errors[]='password is too short';
            }
            else if(strcasecmp( $pass1,$pass2 )!=0)
            {
                $errors[]='password does not match';
            }

            try
            {
                $stmt = $this->db->prepare("SELECT id FROM users where email='$email'");
                $stmt->execute();
                $count = $stmt->rowCount();
                if($count>0)
                {
                    $errors[]='email already exist';
                }
            }
            catch(PDOException $e)
            {
                $errors[]='may be sql query error';
            }

            return $errors;
        }
    }
?>