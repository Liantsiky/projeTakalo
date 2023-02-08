<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Historique_model extends CI_Model{
        //historique par objet
        public function getHistoByObject($idObjet){
            $request="Select * from HistoProprio where idObjet=". $idObjet;
            // $request=sprintf($request,$idObjet);
            // echo $request;
            $query=$this->db->query($request);
            $i=0;
            $res=array();
            foreach ($query->result_array() as $row){
                $res[$i]=$row;
                $i++;
            }
            return $res;
        }
        //insert
       public function saveHisto($idObjet,$idClient){
            $date=date('y-m-d h:i:s');
            $request="insert into HistoProprio values(%s,%s,'%s')";
            $request=sprintf($request,$idObjet,$idClient,$date);
            $query=$this->db->query($request);
        }

    }
?>