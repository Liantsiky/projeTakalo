<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('choix.php');	
	}
	 public function index2()
	{
		$this->load->view('loginUser');
		
	}	
	public function tologin()
	{
		// redirect('admincnt/login');
		$this->load->view('loginAdmin');
			
	}		
	public function toInscri(){
		$this->load->view('inscription');
	}
	// public function toFunction(){
	// 	redirect('Functions/inscription');
	// 	// echo "Eto ";
	// }
	// public function accueil(){
	// 	echo $this->input->get('nom');
	// 	$anarana=array();
	// 	$anarana['nom']=$this->input->get('nom');
	// 	// this->load->view('bonjour',$anarana);
	// }
}
