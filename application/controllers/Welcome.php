<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Welcome_model");

    }
	public function index()
	{
        $vd = new stdClass();
        $vd->datas = $this->Welcome_model->get_all(
            array(),
            "country_name ASC",
            "country"
        );
        $this->load->view('welcome_message', $vd);
	}
	public function form_axios()
	{
      $received_data = json_decode(file_get_contents("php://input"));

      if ($received_data->request_for == 'country'){
          $datas = $this->Welcome_model->get_all(
              array(),
              "country_name ASC",
              "country"
          );
      }elseif($received_data->request_for == 'state'){
          $datas = $this->Welcome_model->get_all(
              array(
                  "country_id" => $received_data->country_id
              ),
              "state_name ASC",
              "state"
          );
      }elseif($received_data->request_for == 'city'){
          $datas = $this->Welcome_model->get_all(
              array(
                  "state_id" => $received_data->state_id
              ),
              "city_name ASC",
              "city"
          );
      }

      echo json_encode($datas);
	}

}
