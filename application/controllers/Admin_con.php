<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Twilio\Rest\Client;

class Admin_con extends CI_Controller {
	public function dashboard(){
	    if(isset($_SESSION['Aid'])){
    		$this->load->model('Handler_db');
    		$data['all'] = $this->Handler_db->counter_for_all();
    		$data['pageName']= "dashboard/dashboard_panel";
    		$this->load->view('dashboard',$data);
	    }
	    else{
	        redirect(base_url("index.php/Admin_con/start_view"));
	    }
	}
	public function start_view(){
		$this->load->view('admin_login');
	}
	public function admin_auth(){
		$this->load->model('Handler_db');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if($this->Handler_db->ad_auth($username,$password)){
				$data =array('Aid' => $this->Handler_db->admin_id_getter($username,$password)[0]['Id']);
				$this->session->set_userdata($data);
				redirect(base_url("index.php/Admin_con/dashboard"));
			}
			else{
				$data=array('fail_admin'=>"Invalid credentials");
				$this->session->set_userdata($data);
				redirect(base_url("index.php/Admin_con/start_view"));
			}
		}
	}
	public function view_page(){
		if(isset($_SESSION['Aid'])){
			$this->load->model('Handler_db');	
			$data['all'] = $this->Handler_db->user_data1();
			$data['pageName']= "admin_main/admin_main";
			$this->load->view('admin', $data);
		}
		else{
			redirect(base_url("index.php/Admin_con/start_view"));
		}
	}
	public function admin_crede(){
		if(isset($_SESSION['Aid'])){
			$this->load->model('Handler_db');	
			$data['all'] = $this->Handler_db->admin_data();
			$data['pageName']= "admin_credentails_list/admin_credentails";
			$this->load->view('admin_cred', $data);
		}
		else{
			redirect(base_url("index.php/Admin_con/start_view"));
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/Admin_con/start_view'));
	}
	public function Remove1(){
		$this->load->model('Handler_db');
		$id = $this->uri->segment(3);
		$this->Handler_db->remove_data1($id);
		redirect(base_url('index.php/Admin_con/view_page'));
		
	}
	public function admin_remove(){
		$this->load->model('Handler_db');
		$id = $this->uri->segment(3);
		$this->Handler_db->remove_admin_data($id);
		redirect(base_url('index.php/Admin_con/admin_crede'));

	}
	public function admin_update(){
		$admin_id = $this->uri->segment(3);
		$this->load->model('Handler_db');
		$data["admin_data"] = $this->Handler_db->fetch_single_admin($admin_id);
		$data['all'] = $this->Handler_db->admin_data();
		$data['pageName']= "admin_credentails_list/admin_credentails";
		$this->load->view('admin_cred', $data);

	}

	public function insert(){
		if(isset($_SESSION['Aid'])){
			$this->load->model('Handler_db');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run()){
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				if($this->input->post('update')){
					$this->Handler_db->update_admin($username,$password,$this->input->post('hidden_id'));
					$this->session->set_userdata(array('fail_insert'=>"Admin Updated"));
				}
				else{
					$this->Handler_db->insert_admin($username,$password);
					$this->session->set_userdata(array('fail_insert'=>"Admin inserted"));
				}
				redirect(base_url('index.php/Admin_con/admin_crede'));
			}
			else{
				$this->session->set_userdata(array('fail_insert'=>"Empty fields"));
				redirect(base_url('index.php/Admin_con/admin_crede'));
			}
		}
		else{
			redirect(base_url("index.php/Admin_con/start_view"));
		}
	}
	public function show_notification(){
		if(isset($_SESSION['Aid'])){
			$this->load->model('Handler_db');
			$data['pageName'] = "notification_management/notification";
			$data['all'] = $this->Handler_db->fetch_medication();
			$this->load->view("notification_main",$data);
		}
		else{
			redirect(base_url("index.php/Admin_con/start_view"));
		}
	}
	public function show_search_notification(){
		if(isset($_SESSION['Aid'])){
			if($this->input->post('search') != null){
				$this->load->model('Handler_db');
				$data['pageName'] = "notification_management/notification";
				$data['all'] = $this->Handler_db->fetch_search_medication($this->input->post('search'));
				$this->load->view("notification_main",$data);
			}
			else{
				redirect(base_url("index.php/Admin_con/show_notification"));
			}
		}
		else{
			redirect(base_url("index.php/Admin_con/start_view"));
		}
	}
	public function medication_remove(){
		$this->load->model('Handler_db');
		$id = $this->uri->segment(3);
		$this->Handler_db->remove_med_data($id);
		redirect(base_url('index.php/Admin_con/show_notification'));
	}
	public function notify_update(){
		$med_id = $this->uri->segment(3);
		$this->load->model('Handler_db');
		$data["med_data"] = $this->Handler_db->fetch_single_med($med_id);
		$data['all'] = $this->Handler_db->fetch_medication();
		$data['pageName'] = "notification_management/notification";
		$this->load->view("notification_main",$data);
	}
	public function update_data(){
		if(isset($_SESSION['Aid'])){
			$this->load->model('Handler_db');
			$this->load->model('Handler_db');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('m_name','M_name','required');
			$this->form_validation->set_rules('dosage','Dosage','required');
			if($this->form_validation->run()){
				$med_name = $this->input->post('m_name');
				$dosage = $this->input->post('dosage');
				$meal = $this->input->post('intake');
				$time = $this->input->post('appt');
				$checker = $this->input->post('optradio');
				$onceevery = "NOP";
				$weekly = "NOP";
				$oncemonth = "NOP";
				if(!empty($meal)){
					$meal = 1;
				}
				else{
					$meal = 0;
				}
				if($checker == "onceevery"){
					$onceevery = "every";
					$onceevery = $this->input->post('once_day');
					if(!empty($time)){
						$this->Handler_db->update_medic($med_name,$dosage,$onceevery,$oncemonth,$meal,$time,$weekly,date("Y-m-d"),$this->input->post('hidden_id'));
						$dat = array(
							'success_message'=>"Your Pill Reminder Was Successfully Updated",
							'color'=>'green'
						);
						$this->session->set_userdata($dat);

						redirect(base_url("index.php/Admin_con/show_notification"));
					}
					else{
						$dat = array(
							'success_message'=>"Your entered data was incorrect OR missing",
							'color'=>'red'
						);
						$this->session->set_userdata($dat);
						redirect(base_url("index.php/Admin_con/show_notification"));
					}
				}
				else if($checker == "weekly"){
					$weekly = $this->input->post('week');
					if(!empty($weekly) && !empty($time)){
						$this->Handler_db->update_medic($med_name,$dosage,$onceevery,$oncemonth,$meal,$time,$weekly,"NOP",$this->input->post('hidden_id'));
						$dat = array(
							'success_message'=>"Your Pill Reminder Was Successfully Updated",
							'color'=>'green'
						);
						$this->session->set_userdata($dat);
						redirect(base_url("index.php/Admin_con/show_notification"));
					}
					else{
						$dat = array(
							'success_message'=>"Your entered data was incorrect OR missing",
							'color'=>'red'
						);
						$this->session->set_userdata($dat);
						redirect(base_url("index.php/Admin_con/show_notification"));
					}
				}	
				else if($checker == "oncemonth"){
					$oncemonth = "month";
					if(!empty($time)){
						$this->Handler_db->update_medic($med_name,$dosage,$onceevery,$oncemonth,$meal,$time,$weekly,"NOP",$this->input->post('hidden_id'));
						$dat = array(
							'success_message'=>"Your Pill Reminder Was Successfully Updated",
							'color'=>'green'
						);
						$this->session->set_userdata($dat);
						redirect(base_url("index.php/Admin_con/show_notification"));
					}
					else{
						$dat = array(
							'success_message'=>"Your entered data was incorrect OR missing",
							'color'=>'red'
						);
						$this->session->set_userdata($dat);
						redirect(base_url("index.php/Admin_con/show_notification"));
					}
				}
			}	
		}
		else{
			redirect(base_url("index.php/Admin_con/start_view"));
		}
	}
}
?>