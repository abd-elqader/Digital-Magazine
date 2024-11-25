<?php

namespace App\Repositories\SQL;

use App\Models\User;
use App\Repositories\Contracts\UserContract;

class UserRepository extends BaseRepository implements UserContract
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function get()
    {
        return $this->model->where('user_type', 'admin')->get();
    }
    public function create(array $attributes = []): mixed
    {
        $attributes['user_type'] = User::TYPES[1];
        return $this->model->create($attributes);
    }

    


}
