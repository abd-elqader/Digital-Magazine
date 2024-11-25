<?php

namespace App\Services\Product;

use App\Models\Article;
use App\Repositories\Contracts\ArticleContract;
use App\Repositories\SQL\BaseRepository;

class ArticleRepository extends BaseRepository implements ArticleContract
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }
}
