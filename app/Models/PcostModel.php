<?php

namespace App\Models;

use CodeIgniter\Model;

class PcostModel extends Model
{
    protected $table = 'pcost';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'category_id', 'pcost_desc', 'pcost_amount', 'pcost_quantity',
        'pcost_unit', 'pcost_duration', 'pcost_unit_duration'
    ];

    public function getDescription($id)
    {
        return $this->db->table($this->table)->select('pcost.id, pcost_desc')
            ->join('cost_category', 'pcost.category_id = cost_category.id')
            ->where('project_id', $id)->where('pcost.deleted_at', NULL)
            ->where('cost_category.deleted_at', NULL)
            ->get()->getResultArray();
    }

    // public function noticeTable($id)
    // {
    //     $builder = $this->db->table($this->table)
    //         ->where('category_id', $id)->where('deleted_at', NULL);
    //     dd($builder);
    //     return $builder;
    // }

    // public function button()
    // {
    //     $buttonFun = function ($row) {
    //         return '<i class="fa fa-pencil act icon-edit-member" data-id="' . $row['id'] . '"></i>
    //         &nbsp; 
    //         <i class="fa fa-trash-o icon-del-team" data-id="' . $row['id'] . '"></i>';
    //     };
    //     return $buttonFun;
    // }
}
