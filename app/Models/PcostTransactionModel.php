<?php

namespace App\Models;

use CodeIgniter\Model;

class PcostTransactionModel extends Model
{
    protected $table = 'pcost_transaction';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['pcost_id', 'cost_item', 'cost_amount', 'cost_status', 'cost_date'];

    public function noticeTable($id)
    {
        return $this->db->table($this->table)
            ->select('pcost_transaction.id, cost_date, pcost_desc, cost_item, cost_status, cost_amount')
            ->join('pcost', 'pcost_transaction.pcost_id = pcost.id')
            ->join('cost_category', 'pcost.category_id = cost_category.id')
            ->where('project_id', $id)->where('pcost_transaction.deleted_at', NULL)
            ->where('pcost.deleted_at', NULL)->where('cost_category.deleted_at', NULL);
    }

    public function date()
    {
        $startDateFun = function ($row) {
            return date('d/m/Y', strtotime($row['cost_date']));
        };

        return $startDateFun;
    }

    public function status()
    {
        $statusFun = function ($row) {

            if ($row['cost_status'] == 'complete') {
                return '<i class="fa fa-check-circle-o fa-lg complete-bedge" aria-hidden="true"><span>Complete</span></i>';
            } else if ($row['cost_status'] == 'incomplete') {
                return '<i class="fa fa-times-circle-o fa-lg incomplete-bedge" aria-hidden="true"><span>Incomplete</span></i>';
            } else {
                return '<span class="badge rounded-pill bg-dark">Unknown</span>';
            }
        };

        return $statusFun;
    }

    public function button()
    {
        $buttonFun = function ($row) {
            return '<i class="fa fa-pencil act icon-edit-member editOutcome" data-id="' . $row['id'] . '"></i>
            &nbsp; 
            <i class="fa fa-trash-o icon-del-team deleteOutcome" data-id="' . $row['id'] . '"></i>';
        };
        return $buttonFun;
    }

    public function trsum($id)
    {
        return $this->db->table($this->table)
            ->selectSum('cost_amount')
            ->join('pcost', 'pcost_transaction.pcost_id = pcost.id')
            ->join('cost_category', 'pcost.category_id = cost_category.id')
            ->where('project_id', $id)->where('pcost_transaction.deleted_at', NULL)
            ->where('pcost.deleted_at', NULL)->where('cost_category.deleted_at', NULL)
            ->get()->getResultArray();
    }
}
