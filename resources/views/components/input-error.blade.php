@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'alert alert-danger p-2 mt-2 mb-0 rounded']) }}>
        <ul class="mb-0 ps-3">
            @foreach ((array) $messages as $message)
                <li class="small">{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
