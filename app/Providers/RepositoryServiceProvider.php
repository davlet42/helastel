<?php

namespace App\Providers;

use App\Repositories\PersonRepositoryInterface;
use App\Repositories\DbPersonRepository;
use App\Repositories\CachePersonRepository;
use App\Repositories\JsonPersonRepository;
use App\Repositories\XlsxPersonRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->bind(PersonRepositoryInterface::class, function () {
            $request = app(Request::class);

            return app($this->repositorySwitcher($request->source), [$request->source]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() : void
    {
        //
    }

    /**
     *
     * @param string
     * @return string
     */
    public function repositorySwitcher(string $source) : string
    {
        switch ($source) {
            case 'db':
                return DbPersonRepository::class;
            case 'cache':
                return CachePersonRepository::class;
            case 'json':
                return JsonPersonRepository::class;
            case 'xlsx':
                return XlsxPersonRepository::class;
            default:
                return DbPersonRepository::class;
        }
    }
}
