<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Functions extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Objets_model','Objet');
		$this->load->model('Demandes_model','Demandes');
		$this->load->model('Historique_model','Historique');
		// $this->load->model('Clients_model');
;

		$this->load->library('session');


	}
	public function deconnect(){
		$this->session->sess_destroy();
		redirect('Welcome/index');
		// $this->load->controller('Welcome');
	}
	public function more($idObjet){
		//$histo=array();
		$histo=$this->Historique->getHistoByObject($idObjet);
		//$objets=array();
		$objet=$this->Objet->getObjetById($idObjet);
		$infos=array();
		for($i=0; $i<count($histo); $i++){
			// echo $histo['histos'][$i]['idClient'];
			$infos[$i]=$this->Clients->getClientById($histo[$i]['idClient']);
		}
		$datas=array();
		$datas['histo']=$histo;
		$datas['objet']=$objet;
		$datas['info']=$infos;
		$this->load->view('More',$datas);
	}
	public function lisitra(){
		$article=array();
		$article['articles']=$this->Objet->getAll();
		$this->load->view('elements',$article);
	}
	//accepter une demande
	public function accepter($idAffaire,$idConnect){
		$this->Demandes->Accepter($idAffaire);
		redirect('Functions/mesdemandes/'.$idConnect);
	}
	//refus d'une demande
	public function refus($idAffaire,$idConnect){
		$this->Demandes->Refus($idAffaire);
		redirect('Functions/mesdemandes/'.$idConnect);
	}
	public function mesDemandes($idConnect){
		$demandes=array();
		$demandes['demandes']=$this->Demandes->getDemandeRecu($idConnect);
		$this->load->view('blog',$demandes);
	}
	public function proposition(){
		$this->load->model('Objets_model');

		$receveur=$this->input->get('receveur');
		$oReceveur=$this->input->get('objetReceveur');
		$demandeur=$this->input->get('demandeur');
		$oDemandeur=$this->input->get('objetDemandeur');
		$this->load->model('Demandes_model','demande');
		$this->demande->sendDemande($demandeur,$receveur,$oDemandeur,$oReceveur);
		$objets=array();
		$objets['objet']=$this->Objets_model->getObjetsNotClient($demandeur);
		$this->load->view('services',$objets);

	}

	public function demande($objet){
		$this->load->model('Objets_model');
		$objets=array();
		$objets['objet']=$this->Objets_model->getObjetById($objet);
		$this->load->view('contact',$objets);
	}
	public function tongasoa(){
		$this->load->view('login3');
	}
	public function theirListe($idClient){
		$this->load->model('Objets_model');
		$objets=array();
		$objets['objet']=$this->Objets_model->getObjetsNotClient($idClient);
		$this->load->view('services',$objets);
	}
	public function myListe($idClient){
		$this->load->library('session');

		$this->load->model('Objets_model');
		$objets=array();
		$objets['objet']=$this->Objets_model->getObjetsByClientId($idClient);
		$this->load->view('about',$objets);
	}

	//Verification email et mot de passe puis redirection
	public function accueil(){
		$this->load->model('Clients_model');
		$row=$this->Clients_model->Check($this->input->get('identifiant'),$this->input->get('motDePasse'));
		if($row==null){
			$anarana=array();
			$anarana['erreur']="Veuillez verifier votre identifiant ou mot de passe";
			$this->load->view('loginUser',$anarana);
		} else{
			$this->load->library('session');

			$this->session->set_userdata('status',$row);
			$_SESSION['idClient']=$row['idClient'];
			
		 	$this->load->view('login3',$row);
		}
	}	

	public function toInscri(){
		$this->load->view('userinscri');
	}
	public function inscription(){
		$this->load->helper('url_helper');
		$this->load->model('Clients_model');
		$nom=$this->input->get('nom');
		$prenom=$this->input->get('prenom');
		$numero=$this->input->get('numero');
		$identifiant=$this->input->get('identifiant');
		$motDePasse=$this->input->get('motDePasse');
		$this->Clients_model->saveClient($nom,$prenom,$numero,$identifiant,$motDePasse);
		redirect('Welcome/index');
		// $this->load->view('loginUser');
	}


	
}

?>