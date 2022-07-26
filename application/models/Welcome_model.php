<?php
class Welcome_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($where = array(), $table)
    {
        return $this->db->where($where)->get($table)->row();
    }
    public function get_all($where = array(), $order = "id ASC", $table)
    {
        return $this->db->where($where)->order_by($order)->get($table)->result();
    }
    public function get_all_array($table)
    {
        return $this->db->get($table)->result_array();
    }
    public function get_join($where = array(), $table, $joinTable, $row)
    {
        return $this->db->where($where)->join($table, "$table.id = $joinTable.product_id")->get($joinTable)->row($row);
    }

    ////////////////////////////////////////////HELPER\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    public function last_row($table)
    {
        return $this->db->get($table)->last_row();
    }
    public function first_row($table)
    {
        return $this->db->get($table)->first_row();
    }
    public function get_limit_result($where, $limit, $order, $table)
    {
        return $this->db->where($where)->limit($limit)->order_by($order)->get($table)->result();
    }
    public function GetKayitVarMiBoolean($where)
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }
    public function get_records($where = array(), $sayfada, $page) //pagination'da bütün kayıtları getirir
    {
        return $this->db->where($where)->limit($sayfada, $page)->order_by("id DESC")->get($this->tableName)->result();
    }
    public function get_count() //pagination'da toplam satır sayısını getirir.
    {
        return $this->db->get($this->tableName)->num_rows();
    }
    ////////////////////////////////////////////HELPER\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\



}
?>