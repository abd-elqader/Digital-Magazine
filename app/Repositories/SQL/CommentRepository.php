<?php

namespace App\Repositories\SQL;

use App\Models\Comment;
use Illuminate\Database\Eloquent\model;
use App\Repositories\Contracts\BaseContract;
use App\Repositories\Contracts\CommentContract;

class CommentRepository extends BaseRepository implements CommentContract
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

}
