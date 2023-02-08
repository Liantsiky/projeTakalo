<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Clients_model extends CI_Model{
        //Prend le client par son Id
        function getClientById($id){
            $request="Select * from Clients where idClient=%s";
            $request=sprintf($request,$id);
            $query=$this->db->query($request);
            $row=$query->row_array();
           
            return $row;
        }
        //Check indentifiant et mot de Passe Correct
        public function Check($identifiant,$motDePasse){
            $request="Select * from Clients where identifiant='%s' and motDePasse='%s'";
            $request= sprintf($request,$identifiant,$motDePasse);
            $query= $this->db->query($request);
            $row=$query->row_array();
            if($row==null){
                return null;
            } else if($row!=null){
                return $row;
            }
        }

        //Insertion d'un nouveau client
        public function saveClient($nom,$prenom,$numero,$identifiant,$motDePasse){
            $request="Insert into Clients values (null,'%s','%s','%s','%s','%s')";
            $request= sprintf($request,$nom,$prenom,$numero,$identifiant,$motDePasse);
            // echo $request;
            $this->db->query($request);
        }


        ///ADMin
        
    }
?>