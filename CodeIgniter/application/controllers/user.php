<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        session_start();
    }

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
                $user = $this->User_model->userConnection($_POST["InputName"], $_POST["InputPwd"]);
                if($user != false)
                {
                    $_SESSION['name'] = $user['name_user'];
                    $_SESSION['id'] = $user['id_user'];
                    $_SESSION['cart'] = array();
                    if($user["admin_user"] == 1)
                        $_SESSION["admin"] = true;
                    else
                        $_SESSION["admin"] = false;

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


    public function removeCart($id)
    {
        array_splice($_SESSION['cart'], $id, 1);

        redirect("/user/getCart");
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        redirect("/user/login");
    }

    public function getCart()
    {
        $this->load->model('Image_model', "", true);

        $this->load->view('head');
        $this->load->view('cart');
        $this->load->view('footer');

    }

    public function search()
    {
        $this->load->model("Product_model", "", true);
        $res = $this->Product_model->getProductBySearch($_GET["term"]);


        $json = json_encode($res);

        echo $json;
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

    public function addCart($id)
    {
        if(!empty($id))
        {
            $this->load->model('Product_model', "", true);
            $product = $this->Product_model->getProductById($id);

            $_SESSION['cart'][] = $product;


            redirect("/user/getCart");
        }
    }
}

/* End of file user.php */
/* Location: ./application/controlnblers/user.php */