<?php
class Poke extends CI_Model {
	// public function pokeOthers($pokerID, $pokeeID)
	// {
	// 	$query = "INSERT INTO poke (user_id, poked_by_id) VALUES (?,?)";
	// 	$values = array($pokeeID, $pokerID);

	// 	return $this->db->query($query, $values);
	// }

	public function get_poke_by_userID($userID)
	{
		return $this->db->query ("SELECT poke_count, pokers.alias AS poker_alias FROM poke p LEFT JOIN user u ON p.user_id = u.id LEFT JOIN user as pokers ON pokers.id = p.poked_by_id WHERE u.id = ? GROUP BY poked_by_id ASC", array($userID))->result_array();
	}
	public function get_count_by_userID($userID)
	{
		return $this->db->query ("SELECT COUNT(poked_by_id) AS poke_count FROM poke WHERE user_id = $userID")->result_array();
	}
	public function addPoke($poker, $pokee)
	{
		$this->db->query ("INSERT INTO poke (user_id, poked_by_id, poke_count) VALUES ($pokee, $poker, 1) ON DUPLICATE KEY UPDATE poke_count = poke_count + 1");

	// 	CREATE TABLE `poke`(
 // `user_id` int(11) NOT NULL DEFAULT '0',
 // `poked_by_id` int(11) NOT NULL DEFAULT '0',
 // `poke_count` int(11) DEFAULT NULL,
 // PRIMARY KEY (`user_id`, `poked_by_id`))
 // ENGINE=InnoDB DEFAULT CHARSET=utf8;
	}
	public function pokeList($poker)
	{
		// return $this->db->query ("SELECT * , pokee.id as pokee_id FROM user u JOIN user pokee ON pokee.id = u.id LEFT JOIN poke ON poke.user_id = u.id WHERE u.id != $poker")->result_array();

		return $this->db->query ("SELECT * FROM user u LEFT JOIN poke p ON p.user_id= u.id WHERE u.id != $poker")->result_array();
	}
}
?>