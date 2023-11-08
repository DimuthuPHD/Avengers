<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Route;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class RouteRepository extends BaseRepository
{

    public function __construct(Route $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Route
    {


        // dd($data);
        DB::beginTransaction();

        try {
            $route = $this->create($data);
        } catch (Throwable $th) {
            DB::rollBack();
            logger()->error('Store Route - ' . $th->getMessage());

            throw new GeneralException(
                __('There was a problem creating this route. Please try again.')
            );
        }

        DB::commit();

        return $route;

    }


    public function update(Route $route , array $data): Route
    {


        DB::beginTransaction();

        try {
             $this->updateById($route->id, $data);
        } catch (Throwable $th) {
            DB::rollBack();
            logger()->error('Update Route - ' . $th->getMessage());

            throw new GeneralException(
                __('There was a problem updating this route. Please try again.')
            );
        }

        DB::commit();

        return $route;

    }

}
