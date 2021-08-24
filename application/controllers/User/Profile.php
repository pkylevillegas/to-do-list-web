<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$this->load->view('user/profile.php'); 
		}
		else{
			header("location: ".base_url()."login");
		}

	}

    public function update_profile()
    {
        $curl = curl_init();

        $data = array(
            "email" => $this->input->post('email'),
            "oldpassword" => $this->input->post('oldpassword'),
            "password" => $this->input->post('password'),
            "firstName" => $this->input->post('firstName'),
            "lastName" => $this->input->post('lastName')
        );

        
        $postdata = json_encode($data);

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:3600/api/v1/user/'.$this->input->post('id'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>$postdata,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Ijk2MGY4YTZmLWU0MjEtNDI5OS1iNzQxLTYwZjAwNjQxMTY1MSIsImVtYWlsIjoianJnbG9tYXIwMTZAZ21haWwuY29tIiwiaWF0IjoxNjIwNzM1NzI2LCJleHAiOjE2MjA3NDI5MjZ9.Zo-9CV0godm7IUv_CGh0A5QLfKAYnvLO9AbjeAeCA5U',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }
}
