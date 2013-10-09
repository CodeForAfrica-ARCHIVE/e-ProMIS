<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class hela_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_county($q) {
        $this->db->select('county');
        $this->db->like('county', $q);
        $query = $this->db->get('hela');
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