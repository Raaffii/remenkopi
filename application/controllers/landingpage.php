<?php
defined('BASEPATH') or exit('No direct script access allowed');

class landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->model('M_pegawai');
        $this->load->helper('file', 'url', 'auth');
    }

    public function index()
    {
        $data['data_produk'] = $this->M_pegawai->vendor();
        $data['data_event'] = $this->M_pegawai->eventposting();

        $data['data_produk_s'] = array_slice($data['data_produk'], 0, 4);
        $data['data_produk_d'] = array_slice($data['data_produk'], 5, 8);
        $data['data_produk_f'] = array_slice($data['data_produk'], 9, 13);
        $data['data_event'] = array_slice($data['data_event'], 0, 2);

        $this->load->view("landingpage/V_landingpage.php", $data);
    }
    public function kirimkrisar()
    {
        $yname = $this->input->post('your_name');
        $yemail = $this->input->post('your_email');
        $yphone = $this->input->post('your_phone');
        $ymassage = $this->input->post('your_massage');
        $data = array(
            'name' => $yname,
            'phone' => $yemail,
            'email' => $yphone,
            'pesan' => $ymassage
        );

        $this->db->insert('tb_krisar', $data);

        redirect('landingpage');
    }

    public function landingpage()
    {
    }
}
