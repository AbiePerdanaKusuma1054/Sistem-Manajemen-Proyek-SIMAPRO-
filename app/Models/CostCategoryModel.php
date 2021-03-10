<?php

namespace App\Models;

use CodeIgniter\Model;

class CostCategoryModel extends Model
{
    protected $table = 'cost_category';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['project_id', 'category_name'];

    public function getCategories($id)
    {
        $getdata = $this->select('cost_category.id, category_name')
            ->join('project', 'cost_category.project_id = project.id')
            ->where('project.id', $id)->where('cost_category.deleted_at', NULL)
            ->where('project.deleted_at', NULL)->get()->getResultArray();

        return $getdata;
    }
}
