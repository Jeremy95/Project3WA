<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function index()
    {
        $this->load->model('Product_model', "", true);
        $this->load->model('Image_model', "", true);
        $product = $this->Product_model->getAllProduct();

        for($i=0; $i<sizeof($product); $i++)
        {
            $product[$i]["image"] = $this->Image_model->getAllImg($product[$i]["id_products"]);
        }

        session_start();
        $this->load->view('head');
        $this->load->view('home', array(
            'products' => $product
        ));
        $this->load->view('footer');
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
}