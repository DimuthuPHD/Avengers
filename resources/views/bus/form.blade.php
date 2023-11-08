<div>
    <x-input-label for="owner_name" :value="__('Owner Name')" />
    <x-text-input id="owner_name" name="owner_name" type="text" class="mt-1 block w-full" :value="old('owner_name', $model?->owner_name)"
        required autofocus autocomplete="owner_name" />
    <x-input-error class="mt-2" :messages="$errors->get('owner_name')" />
</div>

<div>
    <x-input-label for="owner_phone" :value="__('Owner Phone')" />
    <x-text-input id="owner_phone" name="owner_phone" type="number" class="mt-1 block w-full" :value="old('owner_phone', $model?->owner_phone)"
        required autofocus autocomplete="owner_phone" />
    <x-input-error class="mt-2" :messages="$errors->get('owner_phone')" />
</div>

<div>
    <x-input-label for="owner_address" :value="__('Owner Address')" />
    <x-text-area id="owner_address" name="owner_address" class="mt-1 block w-full">{{old('owner_address', $model?->owner_address)}}</x-text-area>
    <x-input-error class="mt-2" :messages="$errors->get('owner_address')" />
</div>

<div>
    <x-input-label for="number_plate" :value="__('Number Plate')" />
    <x-text-input id="number_plate" name="number_plate" type="text" class="mt-1 block w-full" :value="old('number_plate', $model?->number_plate)"
        required autofocus autocomplete="number_plate" />
    <x-input-error class="mt-2" :messages="$errors->get('number_plate')" />
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
