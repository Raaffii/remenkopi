<?php
class M_admin extends CI_Model
{
    public function vendor()
    {

        $this->db->join('tb_jenis', 'tb_produk.jenis = tb_jenis.id_jenis');
        $this->db->where('tb_produk.deleted_at', NULL);
        $query = $this->db->get('tb_produk');
        return $query->result();
    }
    public function jenis()
    {
        return $this->db->get('tb_jenis')->result();
    }
    public function tambah_vendor($data)
    {
        $this->db->join('tb_jenis', 'tb_produk.jenis = tb_jenis.id_jenis');
        return $this->db->insert('tb_produk', $data);
    }
    public function data_transaksi()
    {
        $this->db->where('status', 1);
        //$this->db->join('tb_user', 'tb_transaksi.id_kasir=tb_user.id_user');
        $this->db->join('tb_produk', 'tb_transaksi.produk=tb_produk.id_produk');
        $this->db->order_by('tanggal', 'ASC'); // 'ASC' untuk ascending (terkecil ke terbesar), 'DESC' untuk descending

        $query = $this->db->get('tb_transaksi');
        return $query->result();
    }

    function update_vendor($data, $id)
    {
        $this->db->join('tb_jenis', 'tb_produk.jenis = tb_jenis.id_jenis');
        return $this->db->update('tb_produk', $data, ['id_produk' => $id]);
    }
    public function tambah_event($data)
    {
        return $this->db->insert('tb_event', $data);
    }
    function update_event($data, $id)
    {
        return $this->db->update('tb_event', $data, ['id_event' => $id]);
    }
    public function event()
    {
        $this->db->where('tb_event.deleted_at', NULL);
        $query = $this->db->get('tb_event');
        return $query->result();
    }
    public function hapus_event($id)
    {
        $data = date('Y-m-d H:i:s');
        $data = array(
            'deleted_at' => $data,
            'posting' => 0
        );

        $this->db->where('id_event', $id);
        $this->db->update('tb_event', $data);
    }

    public function pesan()
    {
        $query = $this->db->get('tb_krisar');
        return $query->result();
    }


    public function tampilkasir()
    {
        $akun = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->where('id_kasir', $akun['id_user']);
        $this->db->where('status', 0);
        $this->db->join('tb_produk', 'tb_transaksi.produk=tb_produk.id_produk');
        $query = $this->db->get('tb_transaksi');
        return $query->result();
    }

    public function hapus_vendor($id)
    {
        $data = date('Y-m-d H:i:s');
        $data = array(
            'deleted_at' => $data
        );

        $this->db->where('id_produk', $id);
        $this->db->update('tb_produk', $data);
    }
}
