<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailOrder extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail_order';
    protected $primaryKey       = 'id_detail_order';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['id_order', 'id_menu', 'qty'];

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
    public function getDataId($id)
    {

        $builder = $this->db->table('detail_order');
        $builder->select(',COUNT() AS record');
        $builder->join('masakan', 'masakan.id_menu = detail_order.id_menu');
        $builder->where('id_order', $id);
        $query = $builder->get()->getResult();

        return $query;
    }

    public function getDetail($id)
    {
        $builder = $this->db->table('detail_order');
        $builder->select('*');
        $builder->join('masakan', 'masakan.id_menu = detail_order.id_menu');
        $builder->where('id_order', $id);
        $query = $builder->get()->getResult();

        return $query;
    }

    public function getDataIdBayar($id)
    {

        $builder = $this->db->table('detail_order');
        $builder->select('COUNT(*) AS record');
        $builder->join('masakan', 'masakan.id_menu = detail_order.id_menu');
        $builder->where('id_order', $id);
        $query = $builder->get()->getResult();

        return $query;
    }
}
