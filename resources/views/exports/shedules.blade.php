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
        </tr>
        @endforeach
    </tbody>
</table>
