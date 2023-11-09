<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Bus;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class BusRepository extends BaseRepository
{

    public function __construct(Bus $model)
    {
        $this->model = $model;
    }

    public function store(array $data): Bus
    {
        DB::beginTransaction();

        try {
            $bus = $this->create($data);
        } catch (Throwable $th) {
            DB::rollBack();
            logger()->error('Store Bus - ' . $th->getMessage());

            throw new GeneralException(
                __('There was a problem creating this bus. Please try again.')
            );
        }

        DB::commit();

        return $bus;
    }


    public function update(Bus $bus, array $data): Bus
    {


        DB::beginTransaction();

        try {
            $this->updateById($bus->id, $data);
        } catch (Throwable $th) {
            DB::rollBack();
            logger()->error('Update Bus - ' . $th->getMessage());

            throw new GeneralException(
                __('There was a problem updating this bus. Please try again.')
            );
        }

        DB::commit();

        return $bus;
    }

    public function getActives()
    {
       return  $this->model->active()->get();
    }
}
