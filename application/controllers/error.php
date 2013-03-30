<?php

class Error extends CI_controller {

    function __construct() {
        parent::__construct();

        $this->my_library->is_logged_in();
    }

    function index() {
        $data_error['error_notification'] = "Error ! Data May Not Be Available";
        $this->load->view('error', $data_error);
    }

    function invalid() {
        $data_error['error_notification'] = "Error ! Invalid Data";
        $this->load->view('error', $data_error);
    }

}