<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }
	public function index()
	{

		$this->load->view('welcome_message');
	}
	public function success()
	{
        $alert = array(
            "title" => "OK",
            "text" => "Successfully inserted record!",
            "type" => "success"
        );
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url());
	}
	public function error()
	{
        $alert = array(
            "title" => "Error",
            "text" => "Illegal operation",
            "type" => "error"
        );
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url());
	}
	public function warning()
	{
        $alert = array(
            "title" => "Caution",
            "text" => "You forgot important data",
            "type" => "warning"
        );
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url());
	}
}
