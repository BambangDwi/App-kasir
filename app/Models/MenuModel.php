<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'masakan';
    protected $primaryKey       = 'id_menu';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['nama_menu', 'harga', 'status_menu'];

    // Dates
    //     protected $useTimestamps = false;
    //     protected $dateFormat    = 'datetime';
    //     protected $createdField  = 'created_at';
    //     protected $updatedField  = 'updated_at';
    //     protected $deletedField  = 'deleted_at';

    //     // Validation
    //     protected $validationRules      = [];
    //     protected $validationMessages   = [];
    //     protected $skipValidation       = false;
    //     protected $cleanValidationRules = true;

    //     // Callbacks
    //     protected $allowCallbacks = true;
    //     protected $beforeInsert   = [];
    //     protected $afterInsert    = [];
    //     protected $beforeUpdate   = [];
    //     protected $afterUpdate    = [];
    //     protected $beforeFind     = [];
    //     protected $afterFind      = [];
    //     protected $beforeDelete   = [];
    //     protected $afterDelete    = [];
    public function jumlahMenu()
    {

        $query = $this->db->table('masakan')->countAll();

        return $query;
    }
}
