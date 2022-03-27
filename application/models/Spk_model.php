<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spk_model extends CI_Model
{
  public function editKriteria($id)
  {
    $data = [
      'kode_kriteria' => $this->input->post('kode_kriteria', true),
      'keterangan_kriteria' => $this->input->post('keterangan_kriteria', true),
      'kategori_kriteria' => $this->input->post('kategori_kriteria', true)
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('kriteria', $data);
  }
  public function getKriteriaById($id)
  {
    return $this->db->get_where('kriteria', ['id' => $id])->row_array();
  }
  public function getBobotKriteria()
  {
    return $this->db->query("select 
    a.id as id, 
    a.kriteria_id as kriteria_id, 
    a.nilai_bobot as nilai_bobot, 
    a.keterangan_bobot as keterangan_bobot, 
    b.kode_kriteria as kode_kriteria, 
    b.keterangan_kriteria as keterangan_kriteria, 
    b.kategori_kriteria as kategori_kriteria
    FROM bobot a 
    join kriteria b on a.kriteria_id=b.id")->result_array();
  }
  public function getBobotById($id)
  {
    return $this->db->get_where('bobot', ['id' => $id])->row_array();
  }
  public function editBobot($id)
  {
    $data = [
      'kriteria_id' => $this->input->post('kriteria_id', true),
      'nilai_bobot' => $this->input->post('nilai_bobot', true),
      'keterangan_bobot' => $this->input->post('keterangan_bobot', true)
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('bobot', $data);
  }
  public function getAlternatifById($id)
  {
    return $this->db->get_where('alternatif', ['id' => $id])->row_array();
  }
  public function editAlternatif($id)
  {
    $data = [
      'kode_alternatif' => $this->input->post('kode_alternatif', true),
      'keterangan_alternatif' => $this->input->post('keterangan_alternatif', true)
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('alternatif', $data);
  }
  public function countKriteria()
  {
    return $this->db->query("select count(id) as id from kriteria")->result();
  }
  public function countBobot()
  {
    return $this->db->query("select count(id) as id from bobot")->result();
  }
  public function getNilaiAlt()
  {
    return $this->db->query("select
                               a.*, b.kode_alternatif, b.keterangan_alternatif
                              from nilai_alternatif a
                              join alternatif b on a.alternatif_id=b.id")->result_array();
  }
  public function getNilaiAlternatif($id)
  {
    return $this->db->get_where('nilai_alternatif', ['id' => $id])->row_array();
  }
  public function editNilaiAlternatif($id)
  {
    $data = [
      'alternatif_id' => $this->input->post('alternatif_id'),
      'kriteria_1' => $this->input->post('kriteria_1'),
      'kriteria_2' => $this->input->post('kriteria_2'),
      'kriteria_3' => $this->input->post('kriteria_3'),
      'kriteria_4' => $this->input->post('kriteria_4'),
      'kriteria_5' => $this->input->post('kriteria_5'),
      'kriteria_6' => $this->input->post('kriteria_6'),
      'kriteria_7' => $this->input->post('kriteria_7'),
      'kriteria_8' => $this->input->post('kriteria_8')
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('nilai_alternatif', $data);
  }

  public function countSumBobot()
  {
    return $this->db->query("select sum(nilai_bobot) as bobot from bobot")->result();
  }

  public function nb1($idb)
  {
    return $this->db->query("select nilai_bobot from bobot where id=$idb")->result();
  }

  public function ca1($cid)
  {
    return $this->db->query("select kriteria_1, kriteria_2,kriteria_3,kriteria_4,kriteria_5,kriteria_6,kriteria_7,kriteria_8 from nilai_alternatif WHERE alternatif_id=$cid")->result();
  }
}
