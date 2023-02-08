<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Demandes_model extends CI_Model{
        //Accepter une demande
        function Accepter($idAffaire){
            $this->load->model('Objets_model','Objet');
            $this->load->model('Historique_model',"Historique");
            $date=date('y-m-d h:i:s');
            $request="update Affaires set DateAcceptation='%s' where idAffaire=%s";
            $request= sprintf($request,$date,$idAffaire);
            $query= $this->db->query($request);
            $affaire=$this->getAffairebyId($idAffaire);
            //sauvegarger dans l/'historique le proprio receveur
            $this->Historique->saveHisto($affaire['idObjetDemandeur'],$affaire['idClientReceveur']);
            $this->Historique->saveHisto($affaire['idObjetReceveur'],$affaire['idClientDemandeur']);
            //changer le proprio
            $this->Objet->changeProprio($affaire['idObjetDemandeur'],$affaire['idClientReceveur']);
            $this->Objet->changeProprio($affaire['idObjetReceveur'],$affaire['idClientDemandeur']);
            
        }
        //Refuser une demande
        function Refus($idAffaire){
            $request="delete from Affaires where idAffaire=%s";
            $request=sprintf($request,$idAffaire);
            $query=$this->db->query($request);
        }
        //Prend l'Affaire par l'id
        function getAffairebyId($id){
            $request="select * from Affaires where idAffaire=%s";
            $request=sprintf($request,$id);
            $query=$this->db->query($request);
            $row=$query->row_array();
            return $row;
        }
        //Envoyer une demande
        function sendDemande($idDemandeur,$idReceveur,$idObjetDemandeur,$idObjetReceveur){
            $date=date('y-m-d h:i:s');
            $request="insert into Affaires values (null,%s,%s,%s,%s,'%s',null)";
            $request=sprintf($request,$idDemandeur,$idReceveur,$idObjetDemandeur,$idObjetReceveur,$date);
            $query=$this->db->query($request);

        }
        //get les Objets ou Client est le receveur
         function getDemandeRecu($idClient){
            $request="Select * from Affaires where idClientReceveur=%s and DateAcceptation is NULL";
            $request=sprintf($request,$idClient);
            // echo $request;
            $query=$this->db->query($request);
            $i=0;
            $res=array();
            foreach ($query->result_array() as $row){
                $res[$i]=$row;
                // echo $res[$i]['idClientReceveur'];
                $i++;
            }
            return $res;
        }
    }
?>
