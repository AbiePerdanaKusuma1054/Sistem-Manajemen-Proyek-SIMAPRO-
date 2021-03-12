<?php

namespace App\Models;

use CodeIgniter\Model;

class PrevenuesModel extends Model
{
    protected $table = 'prevenues';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'project_id', 'prevenues_desc', 'prevenues_status',
        'prevenues_amount', 'prevenues_date'
    ];

    public function noticeTable($id)
    {
        return $this->db->table($this->table)
            ->where('project_id', $id)->where('deleted_at', NULL);
    }

    public function status()
    {
        $statusFun = function ($row) {

            if ($row['prevenues_status'] == 'complete') {
                return '<i class="fa fa-check-circle-o fa-lg complete-bedge" aria-hidden="true"><span>Complete</span></i>';
            } else if ($row['prevenues_status'] == 'incomplete') {
                return '<i class="fa fa-times-circle-o fa-lg incomplete-bedge" aria-hidden="true"><span>Incomplete</span></i>';
            } else {
                return '<span class="badge rounded-pill bg-dark">Unknown</span>';
            }
        };

        return $statusFun;
    }

    public function date()
    {
        $startDateFun = function ($row) {
            return date('d/m/Y', strtotime($row['prevenues_date']));
        };

        return $startDateFun;
    }

    public function button()
    {
        $buttonFun = function ($row) {
            return '<i class="fa fa-pencil act icon-edit-member editIncome" data-id="' . $row['id'] . '"></i>
            &nbsp; 
            <i class="fa fa-trash-o icon-del-team deleteIncome" data-id="' . $row['id'] . '"></i>';
        };
        return $buttonFun;
    }

    public function rvsum($id)
    {
        return $this->db->table($this->table)
            ->selectSum('prevenues_amount')->where('project_id', $id)->where('deleted_at', NULL)
            ->get()->getResultArray();
    }
}
