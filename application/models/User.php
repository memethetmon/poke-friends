<?php
class User extends CI_Model {
	function get_user_by_email($email)
	{
		return $this->db->query("SELECT * FROM user WHERE email = ?", array($email))->row_array();
	}
	function add_user($user)
	{
		$query = "INSERT INTO user (name, alias, email, password, created_at, updated_at, dob) VALUES (?,?,?,?,?,?,?)";
		$values = array($user['name'], $user['alias'], $user['email'], $user['password'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $user['dob']);
		return $this->db->query($query, $values);
	}
}