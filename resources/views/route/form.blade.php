<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $model?->name)"
        required autofocus autocomplete="name" />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div>
    <x-input-label for="from" :value="__('from')" />
    <x-text-input id="from" name="from" type="text" class="mt-1 block w-full" :value="old('from', $model?->from)"
        required autofocus autocomplete="from" />
    <x-input-error class="mt-2" :messages="$errors->get('from')" />
</div>

<div>
    <x-input-label for="to" :value="__('to')" />
    <x-text-input id="to" name="to" type="text" class="mt-1 block w-full" :value="old('to', $model?->to)" required
        autofocus autocomplete="to" />
    <x-input-error class="mt-2" :messages="$errors->get('to')" />
</div>

<div>
    <select name="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option value="1" {{old('status', $model?->status) == 1 ? 'selected' : null}}>Active</option>
        <option value="0" {{old('status', $model?->status) == 0 ? 'selected' : null}}>disabled</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('status')" />
</div>

<div class="flex items-center gap-4">
    <x-primary-button>{{ __('Save') }}</x-primary-button>

    @if (session('status') === 'route-updated')
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
    @endif
</div>
