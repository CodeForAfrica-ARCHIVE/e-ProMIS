<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class county_projects_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function for_county($q) {
	
		if(strlen(trim($q))>0){
			$this->db->select('county_projects.id AS id, county.name AS county, sector.name AS sector, sector.image AS image, sector.color AS color, county_projects.projects AS projects, county_projects.amount AS amount');
			$this->db->join('county', 'county.id = county_projects.county','INNER');
			$this->db->join('sector', 'sector.id = county_projects.sector','INNER');
			$this->db->where('county.name', $q);
			$this->db->order_by('sector.name', 'asc'); 
			$query = $this->db->get('county_projects');
			return $query->result();
		}else{
			return array();
		}
    }
	
	function county($q) {
        $this->db->select('county,sector,projects,amount');
        $this->db->where('county', $q);
        $query = $this->db->get('county_projects');
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['county'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    function get_hela($q) {
        $this->db->select('county,projects,sectors,mdg');
        $this->db->like('county', $q);
        $query = $this->db->get('hela');
        if ($query->num_rows() == 1){
            $result = $query->result();
            return $result[0];
        }
    }

}