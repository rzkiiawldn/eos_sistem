<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{
    private $_table = "user";

    public function getAll()
    {
        $query = "SELECT `user`.*,`department`.`name`
                    FROM `user` 
                    JOIN `department` ON `user`.`department_id` = `department`.`department_id`;        
                    ";

        return $this->db->query($query)->result_array();
    }
}