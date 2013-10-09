<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class county_mdgs_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function for_county($q) {
	
		if(strlen(trim($q))>0){
			$this->db->select('county_mdgs.id AS id, county.name AS county, mdg.name AS mdg, mdg.image AS image, mdg.color AS color, county_mdgs.amount AS amount');
			$this->db->join('county', 'county.id = county_mdgs.county','INNER');
			$this->db->join('mdg', 'mdg.id = county_mdgs.mdg','INNER');
			$this->db->where('county.name', $q);
			$this->db->order_by('mdg.id', 'asc'); 
			$query = $this->db->get('county_mdgs');
			
			return $query->result();
		}else{
			return array();
		}
    }
	
	function county($q) {
        $this->db->select('county,mdg,projects,amount');
        $this->db->where('county', $q);
        $query = $this->db->get('county_mdgs');
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['county'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    function get_hela($q) {
        $this->db->select('county,projects,mdgs,mdg');
        $this->db->like('county', $q);
        $query = $this->db->get('hela');
        if ($query->num_rows() == 1){
            $result = $query->result();
            return $result[0];
        }
    }

}