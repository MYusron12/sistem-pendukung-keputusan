<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect('auth/logout');
    }
    // is_logged_in();
    $this->load->model('Spk_model', 'spk');
  }

  #kriteria
  public function kriteria()
  {
    $data['title'] = 'Kriteria';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kriteria'] = $this->db->get('kriteria')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('spk/kriteria', $data);
    $this->load->view('templates/footer');
  }
  public function tambahKriteria()
  {
    $data['title'] = 'Tambah Kriteria';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('spk/tambahKriteria', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('kriteria', [
        'kode_kriteria' => $this->input->post('kode_kriteria', true),
        'keterangan_kriteria' => $this->input->post('keterangan_kriteria', true),
        'kategori_kriteria' => $this->input->post('kategori_kriteria', true)
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Berhasil Menambah Kriteria!</div>');
      redirect('spk/kriteria');
    }
  }
  public function editKriteria($id)
  {
    $data['title'] = 'Edit Kriteria';
    $this->load->model('Spk_model', 'spk');
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kriteriabyid'] = $this->spk->getKriteriaById($id);
    $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('spk/editKriteria', $data);
      $this->load->view('templates/footer');
    } else {
      $this->spk->editKriteria($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Kriteria!</div>');
      redirect('spk/kriteria');
    }
  }
  public function hapusKriteria($id)
  {
    $this->db->delete('kriteria', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Kriteria!</div>');
    redirect('spk/kriteria');
  }

  #bobot
  public function bobot()
  {
    $data['title'] = 'Bobot';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['bobot'] = $this->db->get('bobot')->result_array();
    $data['bobotkriteria'] = $this->spk->getBobotKriteria();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('spk/bobot', $data);
    $this->load->view('templates/footer');
  }
  public function tambahBobot()
  {
    $data['title'] = 'Tambah Bobot';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kriteria'] = $this->db->get('kriteria')->result_array();
    $this->form_validation->set_rules('nilai_bobot', 'Nilai Bobot', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('spk/tambahBobot', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('bobot', [
        'kriteria_id' => $this->input->post('kriteria_id', true),
        'nilai_bobot' => $this->input->post('nilai_bobot', true),
        'keterangan_bobot' => $this->input->post('keterangan_bobot', true)
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Berhasil Menambah Bobot!</div>');
      redirect('spk/bobot');
    }
  }
  public function editBobot($id)
  {
    $data['title'] = 'Edit Bobot';
    $this->load->model('Spk_model', 'spk');
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kriteria'] = $this->db->get('kriteria')->result_array();
    $data['bobotbyid'] = $this->spk->getBobotById($id);
    $this->form_validation->set_rules('nilai_bobot', 'Nilai Bobot', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('spk/editBobot', $data);
      $this->load->view('templates/footer');
    } else {
      $this->spk->editBobot($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Bobot!</div>');
      redirect('spk/bobot');
    }
  }
  public function hapusBobot($id)
  {
    $this->db->delete('bobot', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Bobot!</div>');
    redirect('spk/bobot');
  }

  #alternatif
  public function alternatif()
  {
    $data['title'] = 'Alternatif';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('spk/alternatif', $data);
    $this->load->view('templates/footer');
  }
  public function tambahAlternatif()
  {
    $data['title'] = 'Tambah Alternatif';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('spk/tambahAlternatif', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('alternatif', [
        'kode_alternatif' => $this->input->post('kode_alternatif', true),
        'keterangan_alternatif' => $this->input->post('keterangan_alternatif', true)
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Berhasil Menambah Alternatif!</div>');
      redirect('spk/alternatif');
    }
  }
  public function editAlternatif($id)
  {
    $data['title'] = 'Edit Alternatif';
    $this->load->model('Spk_model', 'spk');
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $data['altid'] = $this->spk->getAlternatifById($id);
    $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('spk/editAlternatif', $data);
      $this->load->view('templates/footer');
    } else {
      $this->spk->editAlternatif($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Alternatif!</div>');
      redirect('spk/alternatif');
    }
  }
  public function hapusAlternatif($id)
  {
    $this->db->delete('alternatif', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Alternatif!</div>');
    redirect('spk/alternatif');
  }

  #dashboard
  public function dashboard()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kriteria'] = $this->db->get('kriteria')->result_array();
    $data['bobot'] = $this->db->get('bobot')->result_array();
    $data['bobotkriteria'] = $this->spk->getBobotKriteria();
    $data['countkriteria'] = $this->spk->countkriteria();
    $data['countbobot'] = $this->spk->countBobot();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $data['nilaialt'] = $this->spk->getNilaiAlt();

    $data['countBobot'] = $this->spk->countSumBobot();

    $data['ca1'] = $this->spk->ca1(2);
    $data['ca2'] = $this->spk->ca1(3);
    $data['ca3'] = $this->spk->ca1(4);
    $data['ca4'] = $this->spk->ca1(5);
    $data['ca5'] = $this->spk->ca1(6);
    $data['ca6'] = $this->spk->ca1(7);
    $data['ca7'] = $this->spk->ca1(8);
    $data['ca8'] = $this->spk->ca1(9);
    $data['ca9'] = $this->spk->ca1(10);
    $data['ca10'] = $this->spk->ca1(11);

    $data['nb1'] = $this->spk->nb1(2);
    $data['nb2'] = $this->spk->nb1(3);
    $data['nb3'] = $this->spk->nb1(4);
    $data['nb4'] = $this->spk->nb1(5);
    $data['nb5'] = $this->spk->nb1(6);
    $data['nb6'] = $this->spk->nb1(7);
    $data['nb7'] = $this->spk->nb1(8);
    $data['nb8'] = $this->spk->nb1(9);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('spk/dashboard', $data);
    $this->load->view('templates/footer');
  }

  #nilai alternatif
  public function nilaialternatif()
  {
    $data['title'] = 'Nilai Alternatif';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $data['kriteria'] = $this->db->get('kriteria')->result_array();
    $data['nilaialt'] = $this->spk->getNilaiAlt();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('spk/nilaiAlternatif', $data);
    $this->load->view('templates/footer');
  }
  public function tambahNilaiAlternatif()
  {
    $data['title'] = 'Tambah Nilai Alternatif';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $this->form_validation->set_rules('kriteria_1', 'Kriteria 1', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('spk/tambahNilaiAlternatif', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('nilai_alternatif', [
        'alternatif_id' => $this->input->post('alternatif_id'),
        'kriteria_1' => $this->input->post('kriteria_1'),
        'kriteria_2' => $this->input->post('kriteria_2'),
        'kriteria_3' => $this->input->post('kriteria_3'),
        'kriteria_4' => $this->input->post('kriteria_4'),
        'kriteria_5' => $this->input->post('kriteria_5'),
        'kriteria_6' => $this->input->post('kriteria_6'),
        'kriteria_7' => $this->input->post('kriteria_7'),
        'kriteria_8' => $this->input->post('kriteria_8')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Berhasil Menambah Nilai Alternatif!</div>');
      redirect('spk/nilaialternatif');
    }
  }
  public function EditNilaiAlternatif($id)
  {
    $data['title'] = 'Edit Nilai Alternatif';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $data['naid'] = $this->spk->getNilaiAlternatif($id);
    $this->form_validation->set_rules('kriteria_1', 'Kriteria 1', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('spk/editNilaiAlternatif', $data);
      $this->load->view('templates/footer');
    } else {
      $this->spk->editNilaiALternatif($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Nilai Alternatif!</div>');
      redirect('spk/nilaialternatif');
    }
  }
  public function hapusNilaiAlternatif($id)
  {
    $this->db->delete('nilai_alternatif', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus Nilai Alternatif!</div>');
    redirect('spk/nilaialternatif');
  }
}
