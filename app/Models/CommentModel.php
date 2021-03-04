<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'project_id', 'user_id', 'comment_text', 'comment_date'
    ];

    public function getComment($id)
    {
        return $this->select('comment.id, username, comment_text, created_at, updated_at')
            ->join('user', 'comment.user_id = user.id')
            ->where('project_id', $id)->get()->getResultArray();
    }
}
