<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmarks extends CI_Controller {

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
    public function index()
    {

        $this->load->model('Bookmarks_model', "", true);

        switch ($this->input->server('REQUEST_METHOD'))
        {
            case "POST":
                $postdata = file_get_contents("php://input");
                $postdata = (array)json_decode($postdata);

                $this->Bookmarks_model->createBookmarks($postdata['title'], $postdata['url'], $postdata['category']);
                break;

            case "GET":
                $res = $this->Bookmarks_model->getBookmarks();

                header("Content-type: application/json");

                echo json_encode($res);
                break;

            case "PUT":
                $postdata = file_get_contents("php://input");
                $postdata = (array)json_decode($postdata);

                $this->Bookmarks_model->updateBookmarks($postdata['id'], $postdata['title'], $postdata['url']);
                break;

            case "DELETE":
                $postdata = file_get_contents("php://input");
                $postdata = (array)json_decode($postdata);

                $this->Bookmarks_model->removeBookmarks($postdata['id']);
                break;


        }

    }

}
