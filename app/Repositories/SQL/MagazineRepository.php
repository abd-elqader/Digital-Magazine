<?php

namespace App\Repositories\SQL;

use App\Models\Magazine;
use App\Repositories\Contracts\MagazineContract;

class MagazineRepository extends BaseRepository implements MagazineContract
{
    public function __construct(Magazine $model)
    {
        parent::__construct($model);
    }
}
