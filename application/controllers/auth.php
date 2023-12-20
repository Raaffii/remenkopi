<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->helper('file', 'url', 'auth');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'Username harus diisi']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Password harus diisi']);

        if ($this->form_validation->run() == false) {
            sudah_login();
            $this->template->load('auth/template', 'auth/V_login');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $akun = $this->M_auth->login($username);


        if ($akun == NULL) {
            redirect('auth');
        } else {
            if (password_verify($password, $akun['password'])) {
                $data = [
                    'username' => $akun['username'],
                    'role' => $akun['role']
                ];

                $this->session->set_userdata($data);
                if ($akun['role'] == 1) {
                    redirect('pegawai/kasir');
                } else {
                    redirect('admin/dashboard');
                }
            } else {
                redirect('auth');
            }
        }
    }




    public function register()
    {
        $this->form_validation->set_rules(
            'name',
            'Name',
            'required|trim',
            ['required' => 'Nama Harus Diisi !']
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[tb_user.email]',
            [
                'required' => 'Email Harus Diisi !',
                'valid_email' => 'Inputan Harus Berupa Email !',
                'is_unique' => 'Email Ini Telah Terdaftar !'
            ]
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[tb_user.username]',
            [
                'required' => 'Username Harus Diisi !',
                'is_unique' => 'Username Ini Telah Terdaftar !'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[5]',
            [
                'required' => 'Password Wajib Diisi !',
                'min_length' => 'Password Terlalu Pendek !'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password1',
            'required|trim|min_length[5]|matches[password1]',
            [
                'required' => 'Konfirmasi Password Wajib Diisi !',
                'matches' => 'Konfirmasi Password Harus Sama !',
                'min_length' => 'Password Terlalu Pendek !'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->template->load('auth/template', 'auth/V_register');
        } else {
            $data = [
                'nama_user' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 1
            ];
            $this->db->insert('tb_user', $data);
            redirect('Auth');
        }
    }
    public function logout()
    {
        $data = array('role', 'username');
        $this->session->unset_userdata($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Anda Sudah Logout </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('auth');
    }
}
