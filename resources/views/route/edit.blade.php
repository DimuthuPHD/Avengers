<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Route') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Route Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add route informations and availability") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('route.update', $route) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')
                            @include('route.form', ['model' => $route])
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
