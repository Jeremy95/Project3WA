<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function recap()
    {

        $this->load->model('Image_model', "", true);
        $this->load->view('head');
        $this->load->view('order_recap');
        $this->load->view('footer');
    }

    public function getOrders()
    {
        $this->load->model('Order_model', "", true);
        $res = $this->Order_model->getAllOrders();

        if(isset($_SESSION))
        {
            if(array_key_exists("admin", $_SESSION))
            {
                if($_SESSION["admin"] == true)
                {
                    $this->load->view('head');
                    $this->load->view('orders', array(
                        'orders' => $res
                    ));
                    $this->load->view('footer');
                }
                else
                {
                    echo "Vous n'avez pas les droits <a href='".site_url("/product")."'>Cliquez ici pour revenir</a>";
                }
            }
            else
            {
                redirect("/user/login");
            }
        }
        else
        {
            redirect("/user/login");
        }


    }

    public function id($idOrder)
    {
        $this->load->model('Order_model', "", true);
        $res = $this->Order_model->getOrderById($idOrder);

        $this->load->view('head');
        $this->load->view('order_details', array(
            'orderDetails' => $res
        ));
        $this->load->view('footer');
    }
}