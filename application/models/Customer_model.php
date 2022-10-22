
<?
class Customer_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }

    public function search_merchant($table, $where)
    {
        // $this->db->like('name_merchant', $where, 'both');
        return $this->db->get($table)->like('name_merchant', $where, 'both')->result_array();
    }
    public function interJoinPaginate($table1, $school1, $table2, $school2, $total, $start, $where = [])
    {
        // $sql = "SELECT {$need} FROM {$table1} INNER JOIN {$table2} ON {$table1}.{$school1} = {$table2}.{$shool2}";
        // $query = $this->db->query($sql);
        $this->db->from($table1);
        $this->db->join($table2, $table1 . '.' . $school1 . ' = '  . $table2 . '.' . $school2, 'inner');
        $this->db->where($where);
        $this->db->limit($total, $start);
        return $this->db->get()->result_array();
    }
    public function getList($table, $where = array(), $total, $start)
    {
        $this->db->limit($total, $start);
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->result_array();
    }
}
?>

