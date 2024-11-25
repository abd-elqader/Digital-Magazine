<?php

namespace App\Repositories\SQL;

use App\Models\Subscription;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Contracts\SubscriptionContract;

class BannerRepository extends BaseRepository implements SubscriptionContract
{
    public function __construct(Subscription $model)
    {
        parent::__construct($model);
    }
    public function get()
    {
        return $this->model->get();
    }
    public function create(array $attributes = []): mixed
    {
        if (isset($attributes['image'])) {
            $imagePath = $attributes['image']->store('banners', 'public');
            $attributes['image'] = $imagePath;
        }

        return $this->model->create($attributes);
    }
    public function update(array $data, int $id)
    {
        $banner = $this->model->findOrFail($id);
        if (isset($data['image'])) {
            Storage::delete('banners/' . $banner->image);
            $imagePath = $data['image']->store('banners', 'public');
            $data['image'] = $imagePath;
        }
        $banner->update($data);
        return $banner;
    }

}
