<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

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
			$this->load->view('user/task.php'); 
		}
		else{
			header("location: ".base_url()."login");
		}

	}

	public function show_task()
	{
		$id = ($this->session->userdata['logged_in']['id']);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://localhost:3600/api/v1/task/show_user_tasks/'.$id,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Ijk2MGY4YTZmLWU0MjEtNDI5OS1iNzQxLTYwZjAwNjQxMTY1MSIsImVtYWlsIjoianJnbG9tYXIwMTZAZ21haWwuY29tIiwiaWF0IjoxNjIwNzM1NzI2LCJleHAiOjE2MjA3NDI5MjZ9.Zo-9CV0godm7IUv_CGh0A5QLfKAYnvLO9AbjeAeCA5U'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}

	public function add_task()
	{
		$id = ($this->session->userdata['logged_in']['id']);

		$curl = curl_init();

		$data = array(
			"title" => $this->input->post('title_create'),
			"description" => $this->input->post('description_create'),
			"start_date" => $this->input->post('start_date_create'),
			"end_date" => $this->input->post('end_date_create'),
			"task_user_id" => $id,
		);

		$postdata = json_encode($data);

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://localhost:3600/api/v1/task/',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $postdata,
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer 710adf4e8234f5d7785f959f9dce645ed55acec1ae255f91061c431da006cf01fbfe55c85a009972eec4af06c6babdfa0526508c49a8fafd47b37b29dba6e026',
			'Content-Type: application/json'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}

	public function get_task()
	{
		$id = $this->input->post('id');

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://localhost:3600/api/v1/task/'.$id,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Ijk2MGY4YTZmLWU0MjEtNDI5OS1iNzQxLTYwZjAwNjQxMTY1MSIsImVtYWlsIjoianJnbG9tYXIwMTZAZ21haWwuY29tIiwiaWF0IjoxNjIwNzM1NzI2LCJleHAiOjE2MjA3NDI5MjZ9.Zo-9CV0godm7IUv_CGh0A5QLfKAYnvLO9AbjeAeCA5U'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;

	}

	public function update_task()
	{
		$id = $this->input->post('id_create');

		$data = array(
			"title" => $this->input->post('title_create'),
			"description" => $this->input->post('description_create'),
			"start_date" => $this->input->post('start_date_create'),
			"end_date" => $this->input->post('end_date_create'),
		);

		$postdata = json_encode($data);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://localhost:3600/api/v1/task/'.$id,
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

	public function update_task_status()
	{
		$id = $this->input->post('id');
		$task_status = $this->input->post('task_status');

		$data = array(
			"task_status" => $task_status
		);

		$postdata = json_encode($data);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://localhost:3600/api/v1/task/'.$id,
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

	public function delete_task()
	{	

		$id = $this->input->post('id');

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://localhost:3600/api/v1/task/'.$id,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS =>'{
			"status": "Inactive"
		}',
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
