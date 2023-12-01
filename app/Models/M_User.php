<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table='user';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder= $this->db->table($this->table);
    }

    //det data utk login
    public function get_data($username)
    {
      return $this->builder
      ->where(array('username' => $username, 'statusUser' => 'aktif'))
      ->get()->getRowArray();
    }

    //get data by ID user
    public function get_dataId($id)
    {
      return $this->builder
      ->where(array('id_user' => $id))
      ->get()->getRowArray();
    }

    //ambil ID terbaru
    public function getMaxId()
    {
        return $this->builder->selectMax('id_user')->get()->getRowArray();
    }

    //tambah data user
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    //update data user
    public function edit($data, $iduser)
    {
      return $this->builder->update($data, ['id_user' => $iduser]);
    }
}
