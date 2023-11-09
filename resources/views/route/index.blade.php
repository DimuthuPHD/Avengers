<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Route') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Route Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("All route details are goes here") }}
                            </p>
                            <x-action-button style="float: right" :url="route('route.create')" class="bg-gray-800 float-right">Create New</x-action-button>
                            <br>
                            <br>
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
                                <x-table-cell>{{$route->id}}</x-table-cell>
                                <x-table-cell>{{$route->name}}</x-table-cell>
                                <x-table-cell>{{$route->from}}</x-table-cell>
                                <x-table-cell>{{$route->to}}</x-table-cell>
                                <x-table-cell class="text-center">

                                    @if ($route->status == 1)
                                        <span class="font-semibold text-md text-gray-800 leading-tight">Active</span>
                                    @else
                                    <span class="font-semibold text-md text-red-600 leading-tight">Disabled</span>
                                    @endif
                                </x-table-cell>
                                <x-table-cell class="text-center">
                                    <x-action-button :url="route('route.edit', $route)" class="bg-gray-800 inline-block">Edit</x-action-button>
                                    <x-delete-button :route="route('route.destroy', $route)" class="bg-gray-800 inline-block">Delete</x-delete-button>
                                </x-table-cell>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$routes->links()}}
                    </section>
            </div>
        </div>
    </div>
</x-app-layout>
