<?php
class Poke extends CI_Model {
	public function addPoke($pokee)
	{
		$query = "INSERT INTO poke (user_id, poked_by_id, poke_count) VALUES (?,?,?)";
		$values = array($pokee['id'], $this->session->userdata('currentUser')['id'], $pokee['count']);

		return $this->db->query($query, $values);
	}

	public function get_poke_by_userID($userID)
	{
		return $this->db->query ("SELECT * FROM user u JOIN poke p ON u.id = p.poked_by_id WHERE u.id = $userID")->result_array();
	}
	public function get_count_by_userID($userID)
	{
		return $this->db->query ("SELECT * FROM user u JOIN poke p ON u.id = p.poked_by_id WHERE u.id = $userID")->row_array();
	}
}
?>