<?php

class Main_model extends CI_Model
{

/*-------------------------- TABLA USERS -------------------------- */
	function insert_data($data)
	{
		$this->db->insert("tbl_user", $data);
	}

	function fetch_data()
	{
		$this->db->select("*");
		$this->db->from("tbl_user");
		$query = $this->db->get();
		return $query;
	}

	function delete_data($id){
		$this->db->where("id", $id);
		$this->db->delete("tbl_user");
	}

	function fetch_single_data($id)
	{
		$this->db->where("id", $id);
		$query = $this->db->get("tbl_user");
		return $query;
	}

	function update_data($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("tbl_user", $data);
	}


	/*-------------------------- LOHIN-------------------------- */
		function can_logiin($first_name, $last_name)
		{
			$this->db->where('first_name', $first_name);
			$this->db->where('last_name', $last_name);
			$query = $this->db->get('tbl_user');

			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}


/*-------------------------- LOHIN ADMIN-------------------------- */
	function can_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('users');

		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

/*-------------------------- CARRITO-------------------------- */
}
