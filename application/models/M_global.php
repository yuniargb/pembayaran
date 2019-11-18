<?php
class M_global extends CI_Model
{
    public function getAll($table, $where = null)
    {
        if ($where == null) {
            return $this->db->get($table);
        } else {
            return $this->db->get_where($table, $where);
        }
    }
    function insert($table, $record)
    {
        $this->db->insert($table, $record);
        return $this->db->affected_rows();
    }

    function update($table, $record, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $record);

        return $this->db->affected_rows();
    }

    function delete($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);

        return $this->db->affected_rows();
    }

    function _auth($username, $password)
    {
        $this->db->where('password', $password);
        $this->db->group_start();
        $this->db->where('username', $username);
        $this->db->or_where('email', $username);
        $this->db->group_end();
        return $this->db->get('tbl_pegawai');
    }
    function laporan()
    {
        $this->db->join('tbl_mahasiswa m', 's.nik=m.nik');
        return $this->db->get('spp s');
    }
}
