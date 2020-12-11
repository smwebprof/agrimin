<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_document_type'; 
    } 

    function getDocumentTypedata(){ 

        $querystring = "SELECT * FROM agrimin_document_type Where is_active = 1 order by id asc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getDocumentDetailsById($params){  //$id

        $querystring = "SELECT afo.*,adt.name FROM agrimin_fileregister_operations afo left join agrimin_document_type adt ON adt.id=afo.document_type_id Where file_no =".$params." order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

 
}
