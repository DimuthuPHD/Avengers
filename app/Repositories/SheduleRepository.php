<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Exports\SheduleExport;
use App\Models\Shedule;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class SheduleRepository extends BaseRepository
{

    public function __construct(Shedule $model)
    {
        $this->model = $model;
    }

    public function store(array $data): Shedule
    {
        DB::beginTransaction();

        try {
            $shedule = $this->create($data);
        } catch (Throwable $th) {
            DB::rollBack();
            logger()->error('Store Shedule - ' . $th->getMessage());

            throw new GeneralException(
                __('There was a problem creating this shedule. Please try again.')
            );
        }

        DB::commit();

        return $shedule;
    }


    public function update(Shedule $shedule, array $data): Shedule
    {


        DB::beginTransaction();

        try {
            $this->updateById($shedule->id, $data);
        } catch (Throwable $th) {
            DB::rollBack();
            logger()->error('Update Shedule - ' . $th->getMessage());

            throw new GeneralException(
                __('There was a problem updating this shedule. Please try again.')
            );
        }

        DB::commit();

        return $shedule;
    }

    public function filter() {
        $query = $this->model
        ->when(request('route_id', null) !== null, function ($q) {
            return $q->where(['route_id' => request('route_id')]);
        })
        ->when(request('bus_id', null) !== null, function ($q) {
            return $q->where(['bus_id' => request('bus_id')]);
        })
        ->when(request('bus_id', null) !== null, function ($q) {
            return $q->where(['bus_id' => request('bus_id')]);
        })
        ->when((request('departure_at', null) || request('arrive_at', null)), function ($q) {
            $q->where(function ($query) {
                if (request('departure_at', null) && request('arrive_at', null)) {
                    return $query->whereBetween('departure_at', [request('departure_at'), request('arrive_at')]);
                }elseif (request('departure_at')) {
                    $query->where('departure_at', request('departure_at'));
                }elseif (request('arrive_at')) {
                    $query->orWhere('arrive_at', request('arrive_at'));
                }
            });
        });

        return $query;
    }
}
