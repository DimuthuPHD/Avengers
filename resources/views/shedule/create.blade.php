<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Shedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Shedule Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add Shedule informations and availability") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('shedules.store') }}" class="mt-6 space-y-6">
                            @csrf
                            @include('shedule.form', ['model' => null])
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
