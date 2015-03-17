<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $this->load->model('Product_model', "", true);
        $this->load->model('Image_model', "", true);
        $product = $this->Product_model->getAllProduct();

        for($i=0; $i<sizeof($product); $i++)
        {
            $product[$i]["image"] = $this->Image_model->getAllImgByIdProduct($product[$i]["id_products"]);
        }

        if(array_key_exists("id", $_SESSION))
        {
            $this->load->view('head');
            $this->load->view('home', array(
                'products' => $product
            ));
            $this->load->view('footer');
        }
        else
        {
            redirect("/user/login");
        }

    }

    public function add()
    {
        $message = "";

        if(array_key_exists("name", $_POST) && array_key_exists("description", $_POST) && array_key_exists("price", $_POST) && array_key_exists("picture", $_FILES))
        {
            if($_POST["name"] != "" && $_POST["description"] != "" && $_POST["price"] != "" &&  !empty($_FILES["picture"]))
            {
                if(isset($_FILES))
                {
                    for ($i = 0; $i < sizeof($_FILES["picture"]["name"]); $i++)
                    {
                        if($_FILES["picture"]["name"][$i] != "")
                            move_uploaded_file($_FILES["picture"]["tmp_name"][$i], "files/" .$_FILES["picture"]["name"][$i]);
                    }
                }

                $this->load->model('Product_model', "", true);
                $lastId = $this->Product_model->setProduct($_POST["name"], $_POST["description"], $_POST["price"]);
                if($lastId != false)
                {
                    for($i=0; $i<sizeof($_FILES["picture"]["name"]); $i++)
                    {
                        $path = "files/".$_FILES["picture"]['name'][$i];
                        $this->load->model("Image_model", "", true);
                        $idImg = $this->Image_model->setImg($path);
                        $this->Product_model->setImgForProduct($idImg, $lastId);

                    }
                    redirect("/product");
                }
                else
                {
                    $message = "L'insertion a échoué";
                }
            }
            else
            {
                $message = "you must to fill in the fields";
            }
        }
        /*if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            die($message);
        }*/

        $this->load->view('head');
        $this->load->view('add_product', array(
            'message' => $message
        ));
        $this->load->view('footer');
    }

    public function precommand()
    {

        if(array_key_exists("data", $_POST))
        {
            $data = json_decode($_POST['data']);

            for ($i = 0; $i < sizeof($_SESSION["cart"]); $i++)
            {
                $_SESSION['cart'][$i]["quantity"] = $data[$i]->quantity;
            }

            $this->load->view('head');
            $this->load->view('info_user');
            $this->load->view('footer');
        }

        if(array_key_exists("name", $_POST) && array_key_exists("firstName", $_POST) && array_key_exists("birthdate", $_POST) && array_key_exists("address", $_POST))
        {
            $this->load->model("Product_model", "", true);
            $idCustomer = $this->Product_model->setCustomer($_POST["name"], $_POST["firstName"], $_POST["birthdate"], $_POST["address"], $_POST["country"], $_POST["city"]);

            if($idCustomer != false)
            {
                $totalOrder = 0;

                for($i = 0; $i < sizeof($_SESSION["cart"]); $i++)
                {
                    $totalOrder += intval($_SESSION["cart"][$i]["quantity"]) * intval($_SESSION["cart"][$i]["prix_products"]);
                }

                $idOrder = $this->Product_model->setOrder($idCustomer, $totalOrder);

                for($i = 0; $i < sizeof($_SESSION["cart"]); $i++)
                {
                    $this->Product_model->setOrderDetails($idOrder, $_SESSION["cart"][$i]["id_products"], $_SESSION["cart"][$i]["quantity"]);
                }

            }

            redirect("/order/recap");
        }
    }

    public function detail($idProduct)
    {
        $this->load->model("Product_model", "", true);
        $product = $this->Product_model->getProductById($idProduct);
        $comment = $this->Product_model->getCommentsByIdProduct($idProduct);
        $product["commentary"] = $comment;

        $this->load->view('head');
        $this->load->view('detail_product', array(
            'product' => $product
        ));
        $this->load->view('footer');
    }

    public function addComment()
    {
        if(array_key_exists("content_comment", $_POST))
        {
            $this->load->model("Product_model", "", true);
            $id_comment = $this->Product_model->addComment($_POST["content_comment"], $_POST["IdUser"], $_POST["productId"]);
            $this->Product_model->setNote($_POST["productId"], $_POST["IdUser"], $_POST["note"]);
            $noteAVG = $this->Product_model->AVGNotes($_POST["productId"]);
            $this->Product_model->updateAVGNoteProduct($_POST["productId"], round($noteAVG['avgnote']));

            $reponse = null;
            if($id_comment != false)
            {
                $reponse = $this->Product_model->getCommentById($id_comment);

                $json = json_encode($reponse);

                echo $json;
            }
        }

    }
}