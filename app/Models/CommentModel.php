<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'project_id', 'user_id', 'comment_text', 'comment_date'
    ];

    public function getComment($id)
    {
        return $this->select('comment.id, username, comment_text, comment.created_at, comment.updated_at')
            ->join('user', 'comment.user_id = user.id')->join('project', 'comment.project_id = project.id')
            ->where('project_id', $id)->where('comment.deleted_at', NULL)->where('project.deleted_at', NULL)
            ->orderBy('comment.id', 'ASC')->get()->getResultArray();
    }
}
