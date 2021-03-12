<?php 
class PajakModel extends CI_model{

	public function get_data($table){
		return $this->db->get($table);
	}

	public function insert_data($data,$table){
		$this->db->insert($table,$data);
	}
	public function update_data($table, $data, $where){
		$this->db->update($table, $data, $where);
	}
	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function get_data_objekpajak(){		
		$this->db->select('*');
		$this->db->from('data_objekpajak');
		$this->db->join('data_wajibpajak', 'data_objekpajak.id_wajibpajak = data_wajibpajak.id_wajibpajak');
		$query = $this->db->get();
		return $query->result();		
	}

	public function update_data_objekpajak($id){		
		$this->db->select('*');
		$this->db->from('data_objekpajak');
		$this->db->where('id_objekpajak', $id);		
		$this->db->join('data_wajibpajak', 'data_objekpajak.id_wajibpajak = data_wajibpajak.id_wajibpajak');
		$query = $this->db->get();
		return $query->result();
	}
}
