<?php

/**
 * @property $db
 */
class User_model extends CI_Model
{
	public function get_all_user()
	{
		return $this->db->get('user')->result();
	}

	public function get_user_id($id_user)
	{
		return $this->db->get_where('user', array('id_users' => $id_user))->row_array();
	}

	public function insert_user($data)
	{
		return $this->db->insert('user', $data);
	}

	public function update_user($id_user, $data)
	{
		$this->db->where('id_users', $id_user);
		return $this->db->update('user', $data);
	}

	public function delete_user($id_user)
	{
		$this->db->where('id_users', $id_user);
		return $this->db->delete('user');
	}
}
