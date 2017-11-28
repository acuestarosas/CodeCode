<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function productos()
    {
        $query = $this->db->get('productos');
        return $query->result();
    }

    public function producto_id($id) {

        $this->db->where('id', $id);
        $item = $this->db->get('productos');

        return $item->row();
    }
}
