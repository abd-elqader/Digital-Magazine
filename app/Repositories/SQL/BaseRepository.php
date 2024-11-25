<?php

namespace App\Repositories\SQL;

use Illuminate\Database\Eloquent\model;
use App\Repositories\Contracts\BaseContract;

abstract class BaseRepository implements BaseContract
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function get()
    {
        return $this->model->get();
    }

    public function create(array $attributes = []): mixed
    {
        return $this->model->create($attributes);
    }

    public function update(array $data, int $id)
    {
        $user = $this->model->findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            return $model->delete();
        } else {
            return false;
        }
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }
}
