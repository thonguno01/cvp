
<?
class Generals_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}

	public function get_where($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->get($table)->result_array();
	}

	public function delete_where($table, $where = array())
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}

	public function get_one_where($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->get($table)->row_object();
	}
	public function get_one_where_array($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->get($table)->result_array();
	}
	public function get_one_where_select($table, $select, $where)
	{
		$this->db->select($select);
		$this->db->where($where);
		return $this->db->get($table)->row_object();
	}
	public function get_one_where_select_ar($table, $select, $where)
	{
		$this->db->select($select);
		$this->db->where($where);
		return $this->db->get($table)->result_array();
	}

	public function get_one_where_array_row($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->get($table)->row_array();
	}
	public function get_list2($table, $where)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->get($table)->result_array(); // array_object
	}
	public function get_list2_ORDER_BY($table, $where, $orderBy)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		$this->db->order_by($orderBy, "desc");
		$this->db->where($where);
		return $this->db->get($table)->result_array(); // array_object
	}
	public function get_list2_ORDER_BY_ASC($table, $where, $orderBy)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		$this->db->order_by($orderBy, "ASC");
		$this->db->where($where);
		return $this->db->get($table)->result_array(); // array_object
	}
	public function get_list3($table, $where)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		// $this->db->where($where);
		$names = array('2', '3');
		$this->db->where_in('status', $names);
		// $this->db->where($where3);
		return $this->db->get($table)->result_array(); // array_object
	}
	public function get_city($table, $limit = 10)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$rs = $this->db->select('*')->limit(63)->get($table)->result_array();
		return $rs;
	}


	public function get_list($table)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		return $this->db->get($table)->result_array(); // array_object
	}

	public function get_list_desc($table)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		$this->db->order_by('update_at', 'DESC');
		return $this->db->get($table)->result_array(); // array_object
	}
	public function get_list_orderby($table)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		$this->db->order_by('update_at', 'DESC');

		return $this->db->get($table)->result_array(); // array_object
	}
	public function get_list_index($table, $where)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->order_by('update_at', 'DESC');
		$this->db->where($where);
		$this->db->select('*')->limit(3);
		return $this->db->get($table)->result_array(); // array_object
	}
	public function get_list_index_1($table, $where)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->get($table)->result_array(); // array_object
	}
	public function get_list_index_2($table, $where)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->get($table)->row_object(); // array_object
	}
	public function get_list_select($select, $table)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select($select);
		return $this->db->get($table)->result_array(); // array_object
	}
	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
	public function update($table, $where = array(), $data = array())
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
	public function updateAll($table, $data = array())
	{
		return $this->db->update($table, $data);
	}
	// public function interJoin($need, $table1, $school1, $table2, $shool2)
	// {
	// 	$sql = "SELECT {$need} FROM {$table1} INNER JOIN {$table2} ON {$table1}.{$school1} = {$table2}.{$shool2} ";
	// 	$query = $this->db->query($sql);
	// 	return $query->result_array();
	// }
	public function interJoin($need, $table1, $school1, $table2, $shool2, $where = [])
	{
		$this->db->select($need);
		$this->db->from($table1);
		$this->db->join($table2, $table1 . '.' . $school1 . '=' . $table2 . '.' . $shool2);
		$this->db->order_by($table1 . '.update_at', 'DESC');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function interJoin1($need, $table1, $school1, $table2, $shool2, $where = [])
	{
		$this->db->select($need);
		$this->db->from($table1);
		$this->db->join($table2, $table1 . '.' . $school1 . '=' . $table2 . '.' . $shool2);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function interJoinWhere($need, $table1, $school1, $table2, $shool2, $where, $dk)
	{
		$sql = "SELECT {$need} FROM {$table1} INNER JOIN {$table2} ON {$table1}.{$school1} = {$table2}.{$shool2} WHERE {$table1}. {$where}";

		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function rightJoin($need, $table1, $school1, $table2, $shool2)
	{
		$sql = "SELECT {$need} FROM {$table1} RIGHT JOIN {$table2} ON {$table1}.{$school1} = {$table2}.{$shool2} ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function leftJoin($need, $table1, $school1, $table2, $shool2)
	{
		$sql = "SELECT {$need} FROM {$table1} LEFT JOIN {$table2} ON {$table1}.{$school1} = {$table2}.{$shool2}";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function get_max($table, $select, $where)
	{
		$this->db->select_max($select);
		$this->db->where($where);
		return $this->db->get($table)->result_array();
	}
	public function get_min($table, $select, $where)
	{
		$this->db->select_min($select);
		$this->db->where($where);
		return $this->db->get($table)->result_array();
	}

	//phân trang
	function list_all($table, $where, $total, $start)
	{
		$this->db->limit($total, $start);

		$names = array('2', '3');
		$this->db->where_in('status', $names);
		$this->db->order_by('update_at', 'DESC');
		return $this->db->get($table)->result_array();
	}
	public function getList($table, $where = array(), $total, $start)
	{
		$this->db->limit($total, $start);
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function search($table, $where)
	{
		$this->db->like($where);
		return $this->db->get($table)->result_array();
	}
	public function search_cit($table, $where)
	{
		$this->db->like('cit_name', $where);
		return $this->db->get($table)->result_array();
	}
	public function get_where_not_null($table, $name)
	{
		$this->db->where($name . ' !=', null);
		return $this->db->get($table)->result_array();
	}
	public function get_id_insert($data = array())
	{
		$this->db->insert('comment_post', $data);
		return $this->db->insert_id();
	}
	public function distinct($table, $select, $where)
	{
		$this->db->distinct();
		$this->db->where($where);
		$this->db->select($select);
		return $this->db->get($table)->result_array();
	}
	//LỌC PAGE THỐNG KÊ
	public function find_his_withdraw_by_date($id_cen, $time_start, $time_end, $start, $limit)
	{
		$this->db->where('updated_at >=', $time_start);
		$this->db->where('updated_at <=', $time_end);
		$this->db->where('id_user ', $id_cen);
		$this->db->limit($limit, $start);

		$res = $this->db->get('withdraw_money')->result_array();

		return $res;
	}
	public function notifi($table, $where)
	{
		$this->db->select('*');
		$this->db->order_by('update_at', 'DESC');
		$this->db->where($where);
		return $this->db->get($table)->result_array();
	}
	public function notifi_object($table, $where)
	{
		$this->db->select('*');
		$this->db->order_by('update_at', 'DESC');
		$this->db->where($where);
		return $this->db->get($table)->row_object();
	}
	public function selectData($data, $tbl, $join = '', $condition = '', $order_by = '', $return_data = 'result_object', $start = '', $limit = '', $like = '')
	{
		$this->db->select($data);

		if ($join != '' && is_array($join)) {
			// Lặp join các bảng
			foreach ($join as $key => $dk_join) {
				$type_join = (isset($dk_join[2])) ? $dk_join[2] : "";
				$this->db->join($dk_join[0], $dk_join[1], $type_join);
			}
		}
		// Thêm điều kiện
		if ($condition != '') {
			$this->db->where($condition);
		}
		if ($like != '') {
			foreach ($like as $key => $value) {
				$value = '%' . str_replace(' ', '%', $value) . '%';
				$this->db->like($key, $value);
			}
		}

		// Thêm sắp xếp
		if ($order_by != '' && is_array($order_by)) {
			foreach ($order_by as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		// Check limit phục vụ phân trang
		if ($start != '' && $limit != '') {
			$this->db->limit($limit, $start);
		}
		// Check limit lấy số lượng cụ thể
		if ($limit != '') {
			$this->db->limit($limit);
		}

		// Lấy dữ liệu trong bảng
		$return = $this->db->get($tbl);

		// Trả về dạng list hay mảng đơn
		if ($return_data == 'result_object') {
			return $return->result_object();
		}
		if ($return_data == 'row') {
			return $return->row_object();
		}
		if ($return_data == 'array') {
			return $return->row_array();
		}
		if ($return_data == 'list_array') {
			return $return->result_array();
		}
	}
}
?>

