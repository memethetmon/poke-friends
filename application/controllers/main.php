<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	// loads the login view
	public function index()
	{
		$this->load->view('user_login_page');
	}
	// processes the student login
	public function login()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
        $this->load->model('User');
        $user = $this->User->get_user_by_email($email);
        if($user && $user['password'] == $password)
        {
            $this->session->set_userdata("currentUser", $user);
            redirect("/pokes");
        }
        else
        {
            $this->session->set_flashdata("login_error", "Invalid email or password!");
            redirect("/main/index");
        }
    }
    // processes the student register
    public function register()
    {
    	// $this->output->enable_profiler(TRUE); //enables the profiler
    	$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("alias", "Alias", "trim|required");
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'min_length[8]|
required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]|required');
		$this->form_validation->set_rules('dob', 'DOB','required'); 

		if($this->form_validation->run() === FALSE)
		{
		    echo $this->view_data["errors"] = validation_errors();
		}
		else
		{
		    //codes to run on success validation here
	        $this->load->model('User');
	        $user_info = array("name" => $this->input->post('name'),
	        						"alias" => $this->input->post('alias'),
	        						"email" => $this->input->post('email'),
	        						"password" => md5($this->input->post('password')),
	        						"dob" => $this->input->post('dob')
	        					);
	        $user = $this->User->add_user($user_info);
	        if ($user === TRUE)
	        {
	        	echo "You have successfully registered! Please login now";
	        	$this->load->view('user_login_page');
	        }
		}
    }
    //simple profile page of a user
    public function poke($pokee = -1)
    {
        if($this->session->userdata('currentUser'))
        {
        	$data['user'] = ["user" => $this->session->userdata("currentUser")];

        	$this->load->model('Poke');

            // $data['pokes'] = $this->Poke->pokeList($data['user']['user']['id']);

            if ($pokee >= 0)
            {
                $this->Poke->addPoke($data['user']['user']['id'], $pokee);
            }
        	$data['show_pokers'] = $this->Poke->get_poke_by_userID($data['user']['user']['id']);

        	$data['counts'] = $this->Poke->get_count_by_userID($data['user']['user']['id']);

            $data['pokes'] = $this->Poke->pokeList($data['user']['user']['id']);
            // var_dump($data['pokes']);
            // die();

        	$this->load->view('pokeView', $data);
        }
        else
            redirect("/users/login");
    }

    //logout the student
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("/");
	}
}