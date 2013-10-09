<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    function _display($output = null) {
        $this->load->view('admin.php', $output);
    }

    function offices() {
        $output = $this->grocery_crud->render();
        $this->_display($output);
    }

    function index() {
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('county_projects');
            $crud->set_subject('County Projects');
            $crud->required_fields('county,sector,projects,amount');
            $crud->columns('id', 'county', 'sector', 'projects', 'amount');
            $crud->set_relation('county', 'county', 'name');
            $crud->set_relation('sector', 'sector', 'name');
            //$crud->unset_texteditor('projects');
            //$crud->unset_texteditor('sectors');
            //$crud->unset_texteditor('mdg');

            $output = $crud->render();

            $this->_display($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function _index() {
        $this->_display((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    function projects() {
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('county_projects');
            $crud->set_subject('County Projects');
            $crud->required_fields('county,sector,projects,amount');
            $crud->columns('id', 'county', 'sector', 'projects', 'amount');
            $crud->set_relation('county', 'county', 'name');
            $crud->set_relation('sector', 'sector', 'name');
			$crud->field_type('amount','integer');
            //$crud->unset_texteditor('projects');
            //$crud->unset_texteditor('sectors');
            //$crud->unset_texteditor('mdg');

            $output = $crud->render();

            $this->_display($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function sector() {
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('sector');
            $crud->set_subject('Sector');
            $crud->required_fields('name','image','color');
            $crud->columns('id', 'name','image','color');

            $output = $crud->render();

            $this->_display($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function county() {
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('county');
            $crud->set_subject('County');
            $crud->required_fields('name');
            $crud->columns('id', 'name');

            $output = $crud->render();

            $this->_display($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function mdg() {
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('mdg');
            $crud->set_subject('MDG');
            $crud->required_fields('name','image','color');
            $crud->columns('id', 'name','image','color');

            $output = $crud->render();

            $this->_display($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function mdgs() {
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('county_mdgs');
            $crud->set_subject('County MDGs');
            $crud->required_fields('county,mdg,amount');
            $crud->columns('id', 'county','mdg','amount');
            $crud->set_relation('county', 'county', 'name');
            $crud->set_relation('mdg', 'mdg', 'name');
            //$crud->unset_texteditor('projects');
            //$crud->unset_texteditor('sectors');
            //$crud->unset_texteditor('mdg');

            $output = $crud->render();

            $this->_display($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function employees_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('employees');
        $crud->set_relation('officeCode', 'offices', 'city');
        $crud->_display_as('officeCode', 'Office City');
        $crud->set_subject('Employee');

        $crud->required_fields('lastName');

        $crud->set_field_upload('file_url', 'assets/uploads/files');

        $output = $crud->render();

        $this->_display($output);
    }

    function customers_management() {
        $crud = new grocery_CRUD();

        $crud->set_table('customers');
        $crud->columns('customerName', 'contactLastName', 'phone', 'city', 'country', 'salesRepEmployeeNumber', 'creditLimit');
        $crud->_display_as('salesRepEmployeeNumber', 'from Employeer')
                ->_display_as('customerName', 'Name')
                ->_display_as('contactLastName', 'Last Name');
        $crud->set_subject('Customer');
        $crud->set_relation('salesRepEmployeeNumber', 'employees', 'lastName');

        $output = $crud->render();

        $this->_display($output);
    }

    function orders_management() {
        $crud = new grocery_CRUD();

        $crud->set_relation('customerNumber', 'customers', '{contactLastName} {contactFirstName}');
        $crud->_display_as('customerNumber', 'Customer');
        $crud->set_table('orders');
        $crud->set_subject('Order');
        $crud->unset_add();
        $crud->unset_delete();

        $output = $crud->render();

        $this->_display($output);
    }

    function products_management() {
        $crud = new grocery_CRUD();

        $crud->set_table('products');
        $crud->set_subject('Product');
        $crud->unset_columns('productDescription');
        $crud->callback_column('buyPrice', array($this, 'valueToEuro'));

        $output = $crud->render();

        $this->_display($output);
    }

    function valueToEuro($value, $row) {
        return $value . ' &euro;';
    }

    function film_management() {
        $crud = new grocery_CRUD();

        $crud->set_table('film');
        $crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname', 'priority');
        $crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
        $crud->unset_columns('special_features', 'description', 'actors');

        $crud->fields('title', 'description', 'actors', 'category', 'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

        $output = $crud->render();

        $this->_display($output);
    }

}