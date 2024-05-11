<?php

/**
 * @property $db
 */
class Auth_model extends CI_Model
{

	function cek_username($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('user')->row_array();
	}

	function get_all_users()
	{
		return $this->db->get('user')->result();
	}

	function get_users_id($id)
	{
		return $this->db->get_where('user', array('id_users' => $id));
	}

	function insert_users($data)
	{
		return $this->db->insert('user', $data);
	}

	function update_users($id_users, $data)
	{
		$this->db->where('id_users', $id_users);
		return $this->db->update('user', $data);
	}

	function delete_users($id_users)
	{
		$this->db->where('id_users', $id_users);
		return $this->db->delete('user');
	}
}
