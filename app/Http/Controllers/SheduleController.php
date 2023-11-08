<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralException;
use App\Exports\SheduleExport;
use App\Http\Requests\Bus\StoreBusRequest;
use App\Http\Requests\Bus\UpdateBusRequest;
use App\Models\Shedule;
use App\Repositories\SheduleRepository;
use App\Repositories\BusRepository;
use App\Repositories\RouteRepository;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class SheduleController extends Controller
{

    protected $sheduleRepository;
    protected $busRepository;
    protected $routeRepository;

    public function __construct(SheduleRepository $sheduleRepository, BusRepository $busRepository, RouteRepository $routeRepository)
    {
        $this->sheduleRepository = $sheduleRepository;
        $this->busRepository = $busRepository;
        $this->routeRepository = $routeRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $routes = $this->routeRepository->getActives()->pluck('name', 'id')->toArray();
        $buses = $this->busRepository->getActives()->pluck('owner_name', 'id')->toArray();
        $shedules =  $this->sheduleRepository->filter();


        if (request()->has('download')) {
            return Excel::download(new SheduleExport($shedules->get()), 'report.xlsx');
        }


        $shedules = $shedules->paginate(10);

        return view('shedule.index')->withRoutes($routes)->withBuses($buses)->withShedules($shedules);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = $this->routeRepository->getActives()->pluck('name', 'id')->toArray();
        $buses = $this->busRepository->getActives()->pluck('owner_name', 'id')->toArray();
        return view('shedule.create')->withRoutes($routes)->withBuses($buses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusRequest $request)
    {
        $data = $request->validated();

        $conflictingSchedules = Shedule::where(function ($query) use ($request) {
            $query->where('bus_id', $request->bus_id)
                ->where(function ($q) use ($request) {
                    $q->whereBetween('departure_at', [$request->departure_at, $request->arrive_at])
                      ->orWhereBetween('arrive_at', [$request->departure_at, $request->arrive_at]);
                });
        })->get();


        if ($conflictingSchedules->isNotEmpty()) {
            throw new GeneralException(
                __('A conflicting schedule already exists for the selected bus and time range.')
            );
        }

        $this->sheduleRepository->store($data);
        return redirect()->route('shedules.index')->withFlashSuccess('Bus Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shedule $shedule)
    {
        $routes = $this->routeRepository->getActives()->pluck('name', 'id')->toArray();
        $buses = $this->busRepository->getActives()->pluck('owner_name', 'id')->toArray();
        return view('shedule.edit')->withShedule($shedule)->withRoutes($routes)->withBuses($buses);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusRequest $request, Shedule $shedule)
    {
        $data = $request->validated();

        if(!$this->validateTime($shedule->id, $request)){
            throw new GeneralException(
                __('A conflicting schedule already exists for the selected bus and time range.')
            );
        }

        $this->sheduleRepository->update($shedule, $data);

        return redirect()->route('shedules.index')->withFlashSuccess('Bus Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shedule $shedule)
    {
        $this->sheduleRepository->deleteById($shedule->id);
        return redirect()->route('shedules.index')->withFlashSuccess('Bus Deleted Successfully');
    }

    /**
     * Check the request times available.
     * ****This function need to more develop. this is testing purpose only
     */
    private function validateTime($id = null, $request){

        $conflictingSchedules = Shedule::when($id !== null , function ($q) use($id) {
            return $q->where('id', '!=', $id);
        })
        ->where(function ($query) use ($request) {
            $query->where('bus_id', $request->bus_id)
                ->where(function ($q) use ($request) {
                    $q->whereBetween('departure_at', [$request->departure_at, $request->arrive_at])
                      ->orWhereBetween('arrive_at', [$request->departure_at, $request->arrive_at]);
                });
        })->get();


        if ($conflictingSchedules->isNotEmpty()) {
          return false;
        }

        return true;
    }
}
