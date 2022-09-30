<?php if (defined('BASEPATH')) or exit('No Direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        //cek_user();
    }

    publik function index ()
    {

    }

    publik function daftarBooking()
    {
        $data['judul'] = "Daftar Booking";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pinjam'] = $this->db->query("select*from booking")->result_array;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/laporan_buku', $data);
        $this->load->view('templates/footer');
    }
}
 
    public function bookingDetail()
    {
        $id_booking = $this->uri->segment(3);
        $data['judul'] = "Booking Detail";
        $data['user'] = $this->ModelUser->cekData(['email => $this->session->userdata('email')])->redirect();
        $data['agt_booking'] = $this->db->query("select*from booking b, user u where b.id_user=<u class="id"></u>
        $data'[detail'] = $this->db->query->('select id_buku, judul_buku, pengarang, penerbit, tahun_terbit')

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/booking-detail', $data);
        $this->load->view('templates/footer');  
    }
}
    public function pinjamAct()
    {
        $id_booking = $this->uri->segment(3);
        $lama = $this->input->post('lama', TRUE);
        $bo = $this->db->query("SELECT*FROM booking WHERE id_booking='$id_booking'")->row();
        $tglsekarang = date('Y-m-d');

        $no_pinjam = $this->ModelBooking->kodeOtomatis('pinjam', 'no_pinjam');
        $databooking = [

            'no_pinjam' => $no_pinjam,
            'id_booking' => $id_booking,
            'tgl_pinjam' => $tglsekarang,
            'id_user' => $bo->id_user,
            'tgl_kembali' => date('Y-md', strtotime('+' . $lama . ' days', strtotime($tglsekarang))),
            'tgl_pengembalian' => 'tgl_sekarang',
            'status' => 'Pinjam',
            'total_denda' => 0
        ];


        $this->ModelPinjam->simpanPinjam($databooking);
        $this->ModelPinjam->simpanDetail($id_booking, $no_pinjam);
        $denda = $this->input->post('denda', TRUE);
        $this->db->query("update detail_pinjam set denda='$denda'");

        //hapus Data booking yang bukunya diambil untuk dipinjam

        $this->ModelPinjam->deleteData('booking', ['id_booking' => $id_booking]);
        $this->ModelPinjam->deleteData('booking_detail', ['id_booking' => $id_booking]);

         //$this->db->query("DELETE FROM booking WHERE id_booking='$id_booking'");

        //update dibooking dan dipinjam pada tabel buku saat buku yang dibookingdiambil untuk dipinjam

        $this->db->query("UPDATE buku, detail_pinjam SET buku.dipinjam=buku.dipinjam+1, buku.dibooking=buku.dibooking-1 WHERE buku.id=detail_pinjam.id_buku");

        $this->session->set_flashdata(
          'pesan', 
          '<div class="alert alertmessage alert-success" role="alert">Data Peminjaman Berhasil Disimpan</div>');
        );

        redirect(base_url() . 'pinjam');
    }
}    