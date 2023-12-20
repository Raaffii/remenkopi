<?php
class M_pegawai extends CI_Model
{
    public function vendor()
    {

        $this->db->join('tb_jenis', 'tb_produk.jenis = tb_jenis.id_jenis');
        $this->db->where('tb_produk.deleted_at', NULL);
        $query = $this->db->get('tb_produk');
        return $query->result();
    }

    public function cari($keyword)
    {
        $this->db->like('nama_produk', $keyword); // Gantilah 'nama_event' dengan nama kolom yang ingin Anda cari
        $this->db->join('tb_jenis', 'tb_produk.jenis = tb_jenis.id_jenis');
        $query = $this->db->get('tb_produk');
        return $query->result();
    }
    public function carifilter($filter)
    {
        $this->db->like('jenis', $filter); // Gantilah 'nama_event' dengan nama kolom yang ingin Anda cari
        $this->db->join('tb_jenis', 'tb_produk.jenis = tb_jenis.id_jenis');
        $this->db->where('tb_produk.deleted_at', NULL);
        $query = $this->db->get('tb_produk');
        return $query->result();
    }

    public function eventposting()
    {
        $this->db->where('tb_event.posting', 1);
        $query = $this->db->get('tb_event');
        return $query->result();
    }

    public function data_event()
    {
        $query = $this->db->get('tb_event');
        return $query->result();
    }

    public function inputkasir($id)
    {
        $akun = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $data = [
            'id_kasir' => $akun['id_user'],
            'produk' => $id
        ];

        $this->db->insert('tb_transaksi', $data);
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



    public function ubahstatus($id)
    {
        $tgl = date('Y-m-d H:i:s');
        $this->db->set('tanggal', $tgl);
        $this->db->set('status', 1);
        $this->db->where('id_kasir', $id);
        $this->db->update('tb_transaksi');
    }

    public function kurangistock($produk)
    {
        $this->db->set('stock', 'stock - 1', FALSE);
        $this->db->where('id_produk', $produk);
        $this->db->update('tb_produk');
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
}
