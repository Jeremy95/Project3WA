<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function login()
    {
        $this->load->model('User_model', "", true);
        $message = "";

        if(array_key_exists("InputName", $_POST) && array_key_exists("InputPwd", $_POST))
        {
            if($_POST["InputName"] != "" && $_POST["InputPwd"]!= "")
            {
                if($this->User_model->userConnection($_POST["InputName"], $_POST["InputPwd"]))
                {
                    session_start();
                    $_SESSION['name'] = $_POST['InputName'];
                    redirect("/product");
                }
                else
                {
                    $message = "name or password are incorrect";
                }
            }
            else
            {
                $message = "you must to fill in the fields";
            }
        }


        $this->load->view('head');
        $this->load->view('login', array(
            'message' => $message
        ));
        $this->load->view('footer');

    }

    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        redirect("/user/login");
    }

    public function register()
    {
        $message = "";

        if(array_key_exists("userName", $_POST) && array_key_exists("userPwd", $_POST) && array_key_exists("userEmail", $_POST))
        {
            if($_POST["userName"] != "" && $_POST["userPwd"] != "" && $_POST["userEmail"] != "")
            {
                $this->load->model('User_model', "", true);
                $lastId = $this->User_model->createUser($_POST["userName"], $_POST["userEmail"], $_POST["userPwd"]);
                if(is_numeric($lastId))
                {
                    redirect("/home");
                }
                else
                {
                    $message = $lastId;
                }
            }
            else
            {
                echo "<script>".
                    "alert('Il faut remplir tout les champs')".
                    "</script>";
            }
        }

        $this->load->view('head');
        $this->load->view('register', array(
            'message' => $message
        ));
        $this->load->view('footer');
    }
}

/* End of file user.php */
/* Location: ./application/controlnblers/user.php */