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
}