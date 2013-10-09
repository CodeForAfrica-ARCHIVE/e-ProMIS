<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hela extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
	
        $county = $this->input->post('search', TRUE);
        if (!isset($county)) {
            $county = $this->input->get('search', TRUE);
            if (isset($county)) {
                $data['projects'] = $this->county_projects_model->for_county($county);
				$data['mdgs'] = $this->county_mdgs_model->for_county($county);
				$data['county'] = array($county);
				$this->load->view('hela', $data);
            } else {
				$this->load->view('hela', null);
            }
        } else {
            $data['projects'] = $this->county_projects_model->for_county($county);
			$data['mdgs'] = $this->county_mdgs_model->for_county($county);
			$data['county'] = array($county);
			$this->load->view('hela', $data);
        }
    }

    function search() {
        $term = $this->input->post('search');
        if (isset($term)) {
            $q = strtolower($term);
            $this->hela_model->get_county($q);
        }
    }

    public function county() {
        $county = $this->input->post('search', TRUE);
        if (!isset($county)) {
            $county = $this->input->get('search', TRUE);
            if (isset($county)) {
                $data['projects'] = $this->county_projects_model->for_county($county);
				$data['mdgs'] = $this->county_mdgs_model->for_county($county);
				$data['county'] = array($county);
				$this->load->view('hela', $data);
            } else {
				$this->load->view('hela', null);
            }
        } else {
            $data['projects'] = $this->county_projects_model->for_county($county);
			$data['mdgs'] = $this->county_mdgs_model->for_county($county);
			$data['county'] = array($county);
			$this->load->view('hela', $data);
        }
    }
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */