<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require 'vendor/autoload.php';

class pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai');
        belum_login('pegawai');
    }

    public function cari()
    {
        $keyword = $this->input->post('pencarian');
        $data['data_produk'] = $this->M_pegawai->cari($keyword);
        $data['data_kasir'] = $this->M_pegawai->tampilkasir();
        $this->template->load('pegawai/template', 'pegawai/V_kasir', $data);
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

        redirect('pegawai/historipenjualan');
    }


    public function filter()
    {
        $filteriasi = $this->input->post('filterisasi');
        $data['data_produk'] = $this->M_pegawai->carifilter($filteriasi);
        $data['data_kasir'] = $this->M_pegawai->tampilkasir();
        $this->template->load('pegawai/template', 'pegawai/V_kasir', $data);
    }
    public function index()
    {
        $this->template->load('pegawai/template', 'pegawai/V_pegawai');
    }

    public function vendor()
    {
        $data['data_produk'] = $this->M_pegawai->vendor();
        $this->template->load('pegawai/template', 'pegawai/V_vendor', $data);
    }

    public function kasir()
    {
        $data['data_produk'] = $this->M_pegawai->vendor();
        $data['data_kasir'] = $this->M_pegawai->tampilkasir();
        $this->template->load('pegawai/template', 'pegawai/V_kasir', $data);
    }

    public function inputkasir($id)
    {
        $jumlah = $this->input->post('jumlah');

        $x = 0;

        while ($x != $jumlah) {
            $this->M_pegawai->inputkasir($id);
            $x++;
        }

        redirect('pegawai/kasir');
    }
    public function konfirmasipembayaran()
    {
        $id = $this->input->post('id');
        $data_kasir = $this->M_pegawai->tampilkasir();

        foreach ($data_kasir as $kasir) {
            $produk = $kasir->produk;
            $this->M_pegawai->kurangistock($produk);
        }
        $this->M_pegawai->ubahstatus($id);
        redirect('pegawai/kasir');
    }

    public function hapustransaksi($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('tb_transaksi');
        redirect('pegawai/kasir');
    }

    public function laporanpenjualan()
    {
        $data['data_transaksi'] = $this->M_pegawai->data_transaksi();
        $this->template->load('pegawai/template', 'pegawai/V_laporan_penjualan', $data);
    }

    public function historipenjualan()
    {
        $data['data_transaksi'] = $this->M_pegawai->data_transaksi();
        $this->template->load('pegawai/template', 'pegawai/V_historipenjualan', $data);
    }

    public function event()
    {
        $data['data_event'] = $this->M_pegawai->data_event();
        $this->template->load('pegawai/template', 'pegawai/V_event', $data);
    }
}
