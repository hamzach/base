<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Site extends CI_Controller{

		public $temp = null;

		function index(){
			$this->load->helper('url');
			
			$is_logged_in = $this->session->userdata('validated');

			if( !isset($is_logged_in) || $is_logged_in != true )
			{
				$var['Error'] = "";
				$this->load->view('index' , $var);	
			}
			else
			{
				$var['FName'] = $this->session->userdata('FirstName');
				$this->load->view('home' , $var);
				$this->is_logged_in();
			}
		}

		function What_is_linkedin(){
			$this->load->view('what_is_linkedin');
		}

		function Join_in(){
			$var['Error'] = "";
			$this->load->view('join_in', $var);
		}

		function Sign_in(){
			$var['Error'] = "";
			$this->load->view('sign_in', $var);
		}

		function Forgot_password(){
			$var['Error'] = "";
			$this->load->view('forgot_password', $var);
		}	

		function Home(){
			$var['FName'] = "";
			$this->load->view('home' , $var);
			$this->is_logged_in();
		}

		function Sign_out(){
			$this->session->sess_destroy();
			$this->load->view('sign_out');
		}

		function check_your_email(){
			$this->load->view('check_your_email');	
		}

		function update() {
			$this->load->view('reset_password');
		}

		function successfully_changed(){
			$this->load->view('successfully_changed');	
		}

		function Countries(){
			$this->load->view('countries');	
		}

		function User_agreement(){
			$this->load->view('user_agreement');	
		}

		function build_profile(){
			$this->load->view('build_profile');
		}

		function Upload_email_contacts(){
			$this->load->view('upload_email_contacts');
		}

		function Connect_contacts(){
			$this->load->view('connect_contacts');	
		}

		function validate_credentials(){
			$this->load->model('sign_in_model');
			$querry = $this->sign_in_model->validate();

			if($querry)
			{
				$var['FName'] = $this->session->userdata('FirstName');
				$this->load->view('home' , $var);
				$this->is_logged_in();
			}
			else
			{
				$var['Error'] = "Email or password was Incorrect.";
				$this->load->view('sign_in', $var);
			}
		}

		function is_logged_in(){
			$is_logged_in = $this->session->userdata('validated');

			if(!isset($is_logged_in) || $is_logged_in != true)
			{
				echo 'You don\'t have permission <br/><a href="../site/sign_in">Sign in</a>';
				die();
			}
		}

		function Create_member(){
			$this->load->model('sign_in_model');
			$result = $this->sign_in_model->create_account();
			
			if ( $result )
			{
				$var['FName'] = $this->session->userdata('FirstName');
				$this->load->view('build_profile',$var);
			}
			else
			{
				$var['Error'] = "Email already Exists!";
				$this->load->view('join_in', $var);		
			}
		}
		
		function Create_member_index(){
			$this->load->model('sign_in_model');
			$result = $this->sign_in_model->create_account();
			
			if ( $result )
			{
				$var['FName'] = $this->session->userdata('FirstName');
				$this->load->view('build_profile',$var);
			}
			else
			{
				$var['Error'] = "Email already Exists!";
				$this->load->view('index', $var);		
			}
		}

		function Create_profile(){
			$this->load->model('sign_in_model');
			$this->sign_in_model->create_profile();
			$this->session->sess_destroy();
			$this->sign_in();
		}

		function password_reset() {
			$temp['email'] = $this->input->post('email');
			$this->load->model('sign_in_model');
			$querry = $this->sign_in_model->check_email();
			if ($querry) {
				$config = array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => '11l4117@gmail.com',
						'smtp_pass' => 'bilal51472',
						'mailtype' => 'html'
					);

				$this->load->library('email' , $config);
				$this->email->set_newline("\r\n");

				$this->email->from('11l4117@gmail.com', 'LinkedIn Password');
				$this->email->to($this->input->post('email'));

				$name = $this->sign_in_model->get_name();
				//echo $name;	

				$id = $this->sign_in_model->get_id();
				//echo $this->temp;

				$mydata = array(
					'Email' => $this->input->post('email'),
					'UserID' => $id,
					'validated' => false
				);
				$this->session->set_userdata($mydata);

				$this->email->subject('Reset Your LinkedIn Password');
				
				$message = 	"<b>LinkedIn</b><br/><br/>
							Hi ".$name .",<br/><br/>
							Changing your password is simple.<br/><br/>"
							. anchor(base_url().'index.php/site/update')
							."<br/><br/>Thank you,<br/><br/>
							The LinkedIn Team<br/><br/></style>";

				$this->email->message( $message );

				if ( $this->email->send())
				{
					$this->check_your_email();					
				}
				else
				{
					show_error( $this->email->print_debugger() );
				}
			}
			else
			{
				$var['Error'] = "Email does not Exists!";
				$this->load->view('forgot_password', $var);
			}
		}

		function update_password() {
			$this->load->model('sign_in_model');
			$this->sign_in_model->change_password();

			$this->successfully_changed();
		}

	}