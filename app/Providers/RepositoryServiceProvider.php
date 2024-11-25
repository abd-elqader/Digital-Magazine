<?php

namespace App\Providers;

use App\Facade\Support\Tools\Directory;
use App\Repositories\Contracts\IEloquentRepository;
use App\Repositories\SQL\BaseRepository;
use App\Repository\Contracts;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        foreach ($this->getModelNames() as $model) {

            // $this->app->bind(RoleContract::class, RoleRepository::class);
            $this->app->bind(
                "App\Repositories\Contracts\\{$model}Contract",
                "App\Repositories\SQL\\{$model}Repository"
            );
        }
    }


    private function getModelNames()
    {
        $models = [];

        $modelFiles = File::files(app_path('Models'));

        foreach ($modelFiles as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $models[] = $fileName;
        }

        return $models;
    }


    public function boot() {}

    private static function setConcrete($name): string
    {
        return (string) str($name)->camel()->headline();
    }
}
