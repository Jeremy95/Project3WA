<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    public function index($name)
    {
        $this->load->view('product_message', array(
            "name" => $name
        ));
    }

    public function hello($name, $age = 20)
    {
        $this->load->view('product_message', array(
            "name" => $name,
            "age" => $age
        ));
    }

    public function show($id)
    {
        $this->load->view("product_message", array(
           'id' => $id
        ));
    }

    public function listAll()
    {
        $this->load->model('Product_model');
        $products = $this->Product_model->getAll();
        $this->load->view("product_list", array(
            "products" => $products
        ));
    }

}