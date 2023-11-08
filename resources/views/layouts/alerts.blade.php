@if(session()->get('flash_danger'))
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if(is_array(json_decode(session()->get('flash_danger'), true)))
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-md text-red-600"> {!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}</p>
        @else
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-md text-red-600"> {!! session()->get('flash_danger') !!}</p>
        @endif
    </p>
</div>
</div>
@endif
@if(session()->get('flash_success'))
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-md text-green-600"> {!! session()->get('flash_success') !!}</p>
    </p>
</div>
</div>
@endif
