<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Route') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                {{-- <div class="max-w-xl"> --}}

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Route Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("All route details are goes here") }}
                            </p>
                            <br>
                        </header>

                        <table class="table table-auto w-full">
                           <thead>
                            <tr>
                                <th class="border leading-loose">#</th>
                                <th class="border leading-loose">Route Name</th>
                                <th class="border leading-loose">From</th>
                                <th class="border leading-loose">To</th>
                                <th class="border leading-loose">Status</th>
                                <th class="border leading-loose">Action</th>
                            </tr>

                           </thead>
                            <tbody>
                                @foreach ($routes as $route)
                            <tr>
                                <td class="border leading-loose">{{$route->id}}</td>
                                <td class="border leading-loose">{{$route->name}}</td>
                                <td class="border leading-loose">{{$route->from}}</td>
                                <td class="border leading-loose">{{$route->to}}</td>
                                <td class="border leading-loose">{{$route->status == 1 ? 'Active' : 'Disabled'}}</td>
                                <td class="border leading-loose text-center"></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
