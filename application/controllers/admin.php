<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_pegawai');
        $this->load->helper('file', 'auth');
        $this->load->library('');
        belum_login('admin');
    }
    public function index()
    {

        $data['data_transaksi'] = $this->M_pegawai->data_transaksi();

        $this->template->load('admin/template', 'admin/dashboard', $data);
    }
    public function historipenjualans()
    {
        $data['data_transaksi'] = $this->M_pegawai->data_transaksi();
        $this->template->load('admin/template', 'admin/historipenjualan', $data);
    }

    public function vendor()
    {
        // $data['vendor'] = $this->M_admin->get_vendor();
        $data['data_produk'] = $this->M_admin->vendor();
        $data['data_jenis'] = $this->M_admin->jenis();
        $this->template->load('admin/template', 'admin/vendor', $data);
    }
    public function hapus_event($id)
    {

        $this->M_admin->hapus_event($id);
        redirect('admin/event');
    }
    public function edit_event()
    {
        $id_event = $this->input->post('id_event');
        $nama_event = $this->input->post('nama_event');
        $waktu = $this->input->post('waktu');
        $tanggal = $this->input->post('tanggal');
        $status = $this->input->post('status');

        $data = [

            'id_event' => $id_event,
            'nama_event' => $nama_event,
            'waktu' => $waktu,
            'tanggal' => $tanggal,
            'status' => $status
        ];

        $save = $this->M_admin->update_event($data, $id_event);

        if ($save) {
            $this->session->set_flashdata('msg_success', 'Data telah diubah!');
        } else {
            $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
        }

        redirect('admin/event');
    }

    public function updatestock()
    {
        $stokBaru = $this->input->post('stok');
        $id = $this->input->post('id');

        $this->db->set('stock', $stokBaru);
        $this->db->where('id_produk', $id);
        $this->db->update('tb_produk');

        redirect('admin/stokbarang');
    }

    public function post($id)
    {
        $this->db->set('posting', 1);
        $this->db->where('id_event', $id);
        $this->db->update('tb_event');
        redirect('admin/event');
    }
    public function unpost($id)
    {
        $this->db->set('posting', 0);
        $this->db->where('id_event', $id);
        $this->db->update('tb_event');
        redirect('admin/event');
    }

    public function tambah_event()
    {
        $config['upload_path']   = './data/event';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 10000;
        $config['max_width']     = 10000;
        $config['max_height']    = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userfile')) {
            echo "gagal tambah";
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
        }


        $id_event = $this->input->post('id_event');
        $nama_event = $this->input->post('nama_event');
        $waktu = $this->input->post('waktu');
        $tanggal = $this->input->post('tanggal');
        $deleted_at = $this->input->post('deleted_at');
        $status = $this->input->post('status');
        $deskripsi = $this->input->post('deskripsi');
        // $id_user = 3333;

        $data = [
            'id_event' => $id_event,
            'nama_event' => $nama_event,
            'waktu' => $waktu,
            'tanggal' => $tanggal,
            'deleted_at' => $deleted_at,
            'gambar' => $gambar,
            'status' => $status,
            'deskripsi' => $deskripsi
        ];

        $this->M_admin->tambah_event($data);

        redirect('admin/event');
    }

    public function tambah_vendor()
    {
        $data['data_produk'] = $this->M_admin->vendor();
        $data['data_jenis'] = $this->M_admin->jenis();
        $config['upload_path'] = './data/produk';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10048; // in KB

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        //proposal------------------------------------------------------------------------------
        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>File Harus Diisi</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
            redirect('admin/vendor');
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
        }
        $id_produk = $this->input->post('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $jenis = $this->input->post('jenis');
        $stock = $this->input->post('stock');
        $harga = $this->input->post('harga');
        $deleted_at = $this->input->post('deleted_at');
        // $id_user = 3333;

        $data = [
            'id_produk' => $id_produk,
            'nama_produk' => $nama_produk,
            'jenis' => $jenis,
            'stock' => $stock,
            'harga' => $harga,
            'gambar' => $gambar,
            'deleted_at' => $deleted_at
        ];

        $this->M_admin->tambah_vendor($data);

        redirect('admin/vendor');
    }

    public function edit_vendor()
    {
        $data['vendor'] = $this->db->get_where('tb_produk', ['id_produk' => $this->session->userdata('id_produk')])->row_array();
        $id_produk = $this->input->post('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $jenis = $this->input->post('jenis');
        $stock = $this->input->post('stock');
        $harga = $this->input->post('harga');
        $deleted_at = $this->input->post('deleted_at');
        $upload_image = $_FILES['gambar'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '5048';
            $config['upload_path'] = './data/produk';
            $config["overwrite"] = true;

            $this->load->library('upload', $config);
            $this->upload->overwrite = true;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $gambar_lama = $this->M_admin->replace_vendor($id);
                if ($gambar_lama != NULL) {
                    $target = './data/produk/' . $gambar_lama;
                    if (file_exists($target)) {
                        unlink($target);
                    }
                }
                $gambar = $this->upload->data('file_name');
            } else {
                $nama_produk = $this->input->post('nama_produk');
                $jenis = $this->input->post('jenis');
                $stock = $this->input->post('stock');
                $harga = $this->input->post('harga');
                $deleted_at = $this->input->post('deleted_at');

                $data = [

                    'id_produk' => $id_produk,
                    'nama_produk' => $nama_produk,
                    'jenis' => $jenis,
                    'stock' => $stock,
                    'harga' => $harga,
                    'deleted_at' => $deleted_at,
                ];

                $save = $this->M_admin->update_vendor($data, $id_produk);

                if ($save) {
                    $this->session->set_flashdata('msg_success', 'Data telah diubah!');
                } else {
                    $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
                }

                redirect('admin/vendor');
            }
        }

        $data = [

            'id_produk' => $id_produk,
            'nama_produk' => $nama_produk,
            'jenis' => $jenis,
            'stock' => $stock,
            'harga' => $harga,
            'gambar' => $gambar,
            'deleted_at' => $deleted_at,
        ];

        $save = $this->M_admin->update_vendor($data, $id_produk);

        if ($save) {
            $this->session->set_flashdata('msg_success', 'Data telah diubah!');
        } else {
            $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
        }

        redirect('admin/vendor');
    }
    public function exportToExcel()
    {
        // Load Model
        $this->load->model('M_pegawai');

        // Create Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // AutoSize Columns
        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Set Header
        $sheet->setCellValue('A1', 'Nama Produk');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Harga');

        // Fetch Data
        $users = $this->M_pegawai->data_transaksi();

        // Populate Data
        $x = 2;
        foreach ($users as $row) {
            $sheet->setCellValue('A' . $x, $row->nama_produk);
            $sheet->setCellValue('B' . $x, $row->tanggal);
            $sheet->setCellValue('C' . $x, $row->harga);
            $x++;
        }

        // Save to Excel File
        $writer = new Xlsx($spreadsheet);
        $fileName = "cek.xlsx";
        $writer->save($fileName);

        redirect('admin/historipenjualans');
    }
    public function pesan()
    {
        $data['data_pesan'] = $this->M_admin->pesan();
        $this->template->load('admin/template', 'admin/pesan', $data);
    }

    public function stokbarang()
    {
        $data['data_produk'] = $this->M_admin->vendor();
        $this->template->load('admin/template', 'admin/stokbarang', $data);
    }
    public function dashboard()
    {
        $data['data_transaksi'] = $this->M_pegawai->data_transaksi();

        $this->template->load('admin/template', 'admin/dashboard', $data);
    }
    public function event()
    {
        $data['data_event'] = $this->M_admin->event();
        $this->template->load('admin/template', 'admin/event', $data);
    }
    public function hapus_vendor($id)
    {

        $this->M_admin->hapus_vendor($id);
        redirect('admin/vendor');
    }
}
