<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proposal_model extends CI_Model
{
    public $table = 'proposal';
    public $id = 'proposal.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->select('proposal.*, user.nama as nama_user,  user.nim as nim_user,  user.angkatan as angkatan_user,  user.kelas as kelas_user,');
        $this->db->from('proposal');
        $this->db->join('user', 'user.id = proposal.nama'); // Sesuaikan dengan nama kolom yang sebenarnya
        $this->db->where('proposal.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function updateStatus($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('proposal', ['status' => $status]);
    }
}
