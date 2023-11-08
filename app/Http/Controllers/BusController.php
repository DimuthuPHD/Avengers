<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bus\StoreBusRequest;
use App\Http\Requests\Bus\UpdateBusRequest;
use App\Models\Bus;
use App\Repositories\BusRepository;

class BusController extends Controller
{

    protected $busRepository;

    public function __construct(BusRepository $busRepository)
    {
        $this->busRepository = $busRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bus.index')->withBuses($this->busRepository->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusRequest $request)
    {
        $data = $request->validated();
        $data['code'] = 'BS-'.date('ymdhist');
        $this->busRepository->store($data);
        return redirect()->route('buses.index')->withFlashSuccess('Bus Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        return view('bus.edit')->withBus($bus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusRequest $request, Bus $bus)
    {
        $data = $request->validated();
        $this->busRepository->update($bus, $data);

        return redirect()->route('buses.index')->withFlashSuccess('Bus Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {

        if ($bus->shedules->count() > 0) {
            return redirect()->back()->withFlashDanger('You are unable to delete this bus because there are existing schedule records associated with it.');
        }

        $this->busRepository->deleteById($bus->id);
        return redirect()->route('buses.index')->withFlashSuccess('Bus Deleted Successfully');
    }
}
