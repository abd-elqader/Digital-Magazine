<?php

namespace App\Repositories\Contracts;

interface BaseContract
{
   public function get();

   public function update(array $data, int $id);

   public function delete($id);

   public function find(int $id);

   public function findOrFail(int $id);

   public function create(array $attributes = []): mixed;

}
