<div>
    <x-input-label for="route_id" :value="__('Route')" />
    <select name="route_id" id="route_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
        <option value="">Select</option>
        @foreach ($routes as $id => $name)
        <option value="{{$id}}" {{old('route_id', $model?->route_id) == $id ? 'selected' : null}}>{{$name}}</option>
        @endforeach
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('route_id')" />
</div>

<div>
    <x-input-label for="bus_id" :value="__('Bus')" />
    <select name="bus_id" id="bus_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
        <option value="">Select</option>
        @foreach ($buses as $id => $name)
        <option value="{{$id}}" {{old('bus_id', $model?->bus_id) == $id ? 'selected' : null}}>{{$name}}</option>
        @endforeach
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('bus_id')" />
</div>

<div>
    <x-input-label for="departure_at" :value="__('Departure at')" />
    <x-text-input id="departure_at" name="departure_at" type="time" class="mt-1 block w-full" :value="old('departure_at', $model?->departure_at)"
        required autofocus autocomplete="departure_at" />
    <x-input-error class="mt-2" :messages="$errors->get('departure_at')" />
</div>

<div>
    <x-input-label for="arrive_at" :value="__('Arrive at')" />
    <x-text-input id="arrive_at" name="arrive_at" type="time" class="mt-1 block w-full" :value="old('arrive_at', $model?->arrive_at)"
        required autofocus autocomplete="arrive_at" />
    <x-input-error class="mt-2" :messages="$errors->get('arrive_at')" />
</div>

<div>
    <x-input-label for="notes" :value="__('Notes')" />
    <x-text-area id="notes" name="notes" class="mt-1 block w-full">{{old('notes', $model?->notes)}}</x-text-area>
    <x-input-error class="mt-2" :messages="$errors->get('notes')" />
</div>


<div>
    <select name="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option value="1" {{old('status', $model?->status) == 1 ? 'selected' : null}}>Active</option>
        <option value="0" {{old('status', $model?->status) == 0 ? 'selected' : null}}>disabled</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('status')" />
</div>

<div class="flex items-center gap-4">
    <x-primary-button>{{ __($model ? 'Update' : 'Save') }}</x-primary-button>
    <x-action-button :url="route('buses.index')" class="bg-red-600">{{ __('Cancel') }}</x-action-button>
</div>
