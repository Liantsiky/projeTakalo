<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Objets_model extends CI_Model{

        //change le proprio de l'objet
        function changeProprio($idObjet,$idNew){
            $request="update Objets set idClient=%s where idObjet=%s";
            $request=sprintf($request,$idNew,$idObjet);
            $query=$this->db->query($request);
        }
        //get si une demande a deja ete envoyee
        function checkEfanandefa($idClient,$idArticle){
            $request="select * from Affaires where idClientDemandeur=%s and idObjetReceveur=%s";
            $request=sprintf($request,$idClient,$idArticle);
            // echo $request;
            $query=$this->db->query($request);
            $row=$query->row_array();
            if($row==null){
                return 0;
            }else{
                return 1;
            }
        }
        //get objet by id avec ses informations
        function getObjetById($id){
            $request=" select c.nom nom,c.prenom prenom,c.numero numero,o.idObjet idObjet,o.descriptions descriptions,o.idClient idClient,o.urlPhoto urlPhoto,o.prixEstimatif prixEstimatif,cat.nom categorie from 
            Clients as c
            join Objets as o on o.idClient=c.idClient
            join Categorie as cat on cat.idCategorie=o.idCategorie
            where idObjet=%s";
            $request = sprintf($request,$id);
            $query=$this->db->query($request);
            $row=$query->row_array();
            return $row;
        }
        //get les Objets qui n'appartiennent pas au Client
        function getObjetsNotClient($idClient){
            $request="Select * from Objets where idClient !=%s";
            $request = sprintf($request,$idClient);
            $query=$this->db->query($request);
            $i=0;
            $res=array();
            foreach ($query->result_array() as $row){
                $res[$i]=$row;
                $i++;
            }
            return $res;

        }
        
        //get les Objets selon l'id du Client
        function getObjetsByClientId($idClient){
            $request="Select * from Objets where idClient=%s";
            $request= sprintf($request,$idClient);
            $query=$this->db->query($request);
            $i=0;
            $res=array();
            foreach ($query->result_array() as $row){
                $res[$i]=$row;
                $i++;
            }
            return $res;
        }
        //get tous les entanas
        function getAll(){
            $request="Select * from Objets";
            $request= sprintf($request);
            $query=$this->db->query($request);
            $i=0;
            $res=array();
            foreach ($query->result_array() as $row){
                $res[$i]=$row;
                $i++;
            }
            return $res;
        }
    }
?>