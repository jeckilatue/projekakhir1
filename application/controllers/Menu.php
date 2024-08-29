<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $this->load->model('Menu_model');
        $dish = $this->Menu_model->getMenu();
        $data['dishesh'] = $dish;
        $this->load->view('front/partials/header');
        $this->load->view('front/menu', $data);
        $this->load->view('front/partials/footer');
    }
}
