<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRouteRequest;
use App\Http\Requests\UpdateRouteRequest;
use App\Models\Route;
use App\Repositories\RouteRepository;

class RouteController extends Controller
{

    protected $routeRepository;

    public function __construct(RouteRepository $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('route.index')->withRoutes($this->routeRepository->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('route.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRouteRequest $request)
    {
        $data = $request->validated();
        $data['code'] = 'R'.date('ymdhist');
        $this->routeRepository->create($data);

        return redirect()->route('route.index')->withFlashSuccess('Route Created Successfully');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        return view('route.edit')->withRoute($route);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRouteRequest $request, Route $route)
    {
        $data = $request->validated();
        $this->routeRepository->update($route, $data);

        return redirect()->route('route.index')->withFlashSuccess('Route Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        $this->routeRepository->deleteById($route->id);
        return redirect()->route('route.index')->withFlashSuccess('Route Deleted Successfully');
    }
}
