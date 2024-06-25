<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Defaultvehicleexpenses_model extends App_Model
{
    public function __construct()
    {
        parent::__construct();
			
    }

    /**
     * Get payment by ID
     * @param  mixed $id payment id
     * @return object
     */
    public function get()
    {
        $query = "SELECT * FROM ".db_prefix()."able_default_vehicle_expenses WHERE is_active=1";
		$exe = $this->db->query($query);
		$result = $exe->result_array();
        return $result;
    }

    
}
