<?php

    class Validate
    {
        private $db;

        public function __construct($conn)
        {
            $this->db=$conn;
        }

        public function verify_signup_data($username,$email,$user_type,$pass1,$pass2)
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

        public function varify_login_data($email,$pass)
        {
            $errors=array();

            try
            {
                $stmt = $this->db->prepare("SELECT id,active_status FROM users where email='$email' and pass='$pass'");
                $stmt->execute();
                $count = $stmt->rowCount();
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                if($count==0)
                {
                     $errors[]='email and password you provided are invalid';
                }
                else
                {
                    if($results['active_status']==0)
                    {
                        $errors[]='account is not activated yet';
                    }
                }
            }
            catch(PDOException $e)
            {
                $errors[]='may be sql query error';
            }

            return $errors;
        }


        public function validate_parttime_teaching_data($post_dict)
        {
            $errors=array();

            try
            {

                if( !isset($post_dict['name']) || !isset($post_dict['schoolof']) || !isset($post_dict['month']) || !isset($post_dict['department']) || !isset($post_dict['lecture_rate']) ||
                !isset($post_dict['tutorial_rate']) ||  !isset($post_dict['traveling_days'])  || !isset($post_dict['signature']) || !isset($post_dict['cur_date']) ||  !isset($post_dict['signature_hod']) || !isset($post_dict['signature_dean']) )
                {
                    $errors[]='Please fill up input fields perfectly there are something wrongggggg';
                    return $errors;
                }

            }
            catch(Exception $e)
            {
                 $errors[]='There are some problem from exception blockkkkk';
                 return $errors;
            }

            try
            {
                $number=$post_dict['total_object'];
                for ($x = 0; $x <$number; $x++)
                {
                    $my_date="my_date-".$x;
                    $subject="subject-".$x;
                    $hours="hours-".$x;
                    $lecture_type="lecture_type-".$x;
                    $varified_by="varified_by-".$x;

                    if(!isset($post_dict[$my_date]) || !isset($post_dict[$subject]) || !isset($post_dict[$hours]) || !isset($post_dict[$lecture_type]) || !isset($post_dict[$varified_by]))
                    {
                         $errors[]='Please fill up input fields perfectly there are something wrong';
                         return $errors;
                    }
                }

            }
            catch(Exception $e)
            {
                 $errors[]='There are some problem from exception block';
            }


            return $errors;
        }
    }
?>