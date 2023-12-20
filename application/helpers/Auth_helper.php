<?php
function sudah_login()
{
    $ci =& get_instance();
    if ($ci->session->userdata('username')) {
        if ($ci->session->userdata('role')==1) {
            redirect('pegawai/kasir','refresh');
        }else {
            redirect('admin/dashboard','refresh');
        }
        
    }
}
function belum_login($nama_controller)
{
    $ci =& get_instance();
    if ($ci->session->userdata('username')) {
        $menu_pegawai=['pegawai','pegawai/vendor','pegawai/kasir','pegawai/input_kasir','pegawai/konfirmasipembayaran','pegawai/hapustransaksi','pegawai/laporanpenjualan','pegawai/event','pegawai/historipenjualan'];
        $menu_admin =['admin','admin/vendor','admin/kasir','admin/event'];
        if ($ci->session->userdata('role')==1) {
            if (in_array($nama_controller,$menu_pegawai)) {
                return true;
            }
        }
        elseif ($ci->session->userdata('role')==2) {
            if (in_array($nama_controller,$menu_admin)) {
                return true;
            }
        }
    sudah_login();
      
    }else {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda Belum Login!!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('auth','refresh');
    }
}
