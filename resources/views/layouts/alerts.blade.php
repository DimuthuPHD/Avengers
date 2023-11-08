@if(session()->get('flash_danger'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if(is_array(json_decode(session()->get('flash_danger'), true)))
            <p style="margin: 32px 0 0 0; border: 1px solid; padding: 6px;" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-md text-red-600"> {!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}</p>
        @else
            <p style="margin: 32px 0 0 0; border: 1px solid; padding: 6px;" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-md text-red-600"> {!! session()->get('flash_danger') !!}</p>
        @endif
</div>
@endif
@if(session()->get('flash_success'))
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <p style="margin: 32px 0 0 0; border: 1px solid; padding: 6px;" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-md text-green-600"> {!! session()->get('flash_success') !!}</p>
    </p>
</div>
</div>
@endif
