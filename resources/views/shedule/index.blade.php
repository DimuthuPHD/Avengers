<x-app-layout>
    @php
    $currentUrl = request()->fullUrl();
    $downloadUrl = Str::contains($currentUrl, 'download=true') ? $currentUrl : $currentUrl . (Str::contains($currentUrl, '?') ? '&' : '?') . 'download=true';
@endphp
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bus List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Bus Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("All Bus details are goes here") }}
                        </p>

                        <x-action-button style="float: right" :url="route('shedules.create')"
                            class="bg-gray-800 float-right">Create New</x-action-button>
                        <br>
                        <br>
                        <br>

                        <form action="{{route('shedules.index')}}" method="get" id="filterForm">
                            <div class="inline-block">
                                <x-input-label for="route_id" :value="__('Route')" />
                                <select name="route_id" id="route_id"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Select</option>
                                    @foreach ($routes as $id => $name)
                                    <option value="{{$id}}" {{request('route_id')==$id ? 'selected' : null}}>{{$name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="inline-block">
                                <x-input-label for="bus_id" :value="__('Bus')" />
                                <select name="bus_id" id="bus_id"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Select</option>
                                    @foreach ($buses as $id => $name)
                                    <option value="{{$id}}" {{request('bus_id')==$id ? 'selected' : null}}>{{$name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="inline-block">
                                <x-input-label for="departure_at" :value="__('Arrive at')" />
                                <x-text-input id="departure_at" name="departure_at" type="time" class="mt-1 block w-full"
                                    :value="request('departure_at')" />
                            </div>

                            <div class="inline-block">
                                <x-input-label for="arrive_at" :value="__('Arrive at')" />
                                <x-text-input id="arrive_at" name="arrive_at" type="time" class="mt-1 block w-full"
                                    :value="request('arrive_at')" />
                            </div>
                            <div class="inline-block">
                                <x-primary-button>Filter</x-primary-button>
                                @if (count(request()->all())> 0)
                                <x-action-button :url="route('shedules.index')" class="bg-red-600">Reset</x-action-button>
                                <x-action-button :url="$downloadUrl" class="bg-gray-500">Download</x-action-button>
                                @endif
                            </div>

                            <br>
                            <br>


                        </form>
                    </header>
                    <table class="table table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border leading-loose">Bus Number</th>
                                <th class="border leading-loose">Route</th>
                                <th class="border leading-loose">Departure</th>
                                <th class="border leading-loose">Arrival</th>
                                <th class="border leading-loose">Owner Phone</th>
                                <th class="border leading-loose">Number Plate</th>
                                <th class="border leading-loose">Status</th>
                                <th class="border leading-loose">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($shedules as $shedule)
                            <tr>
                                <x-table-cell>{{$shedule->bus->number_plate}}</x-table-cell>
                                <x-table-cell>{{$shedule->route->name}}</x-table-cell>
                                <x-table-cell>{{\Carbon\Carbon::parse($shedule->departure_at)->format('h:i A')}}
                                </x-table-cell>
                                <x-table-cell>{{\Carbon\Carbon::parse($shedule->arrive_at)->format('h:i A')}}
                                </x-table-cell>
                                <x-table-cell>{{$shedule->bus->owner_phone}}</x-table-cell>
                                <x-table-cell>{{$shedule->bus->number_plate}}</x-table-cell>
                                <x-table-cell class="text-center">
                                    @if ($shedule->status == 1)
                                    <span class="font-semibold text-md text-gray-800 leading-tight">Active</span>
                                    @else
                                    <span class="font-semibold text-md text-red-600 leading-tight">Disabled</span>
                                    @endif
                                </x-table-cell>
                                <x-table-cell class="text-center">
                                    <x-action-button :url="route('shedules.edit', $shedule->id)"
                                        class="bg-gray-800 inline-block">Edit</x-action-button>
                                    <x-delete-button :route="route('shedules.destroy', $shedule->id)"
                                        class="bg-gray-800 inline-block">Delete</x-delete-button>
                                </x-table-cell>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{$shedules->links()}}
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
