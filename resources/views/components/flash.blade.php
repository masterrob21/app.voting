@props([
    'type' => 'success',
    'colors' => [
        'success' => 'bg-green-400',
        'error' => 'bg-red-400',
        'warning' => 'bg-orange-400',
        'info' => 'bg-blue-300'
    ]
])

<div class="p-4 {{ $colors[$type] }} mt-3" id="alert-message">
    <p>
        {{ $slot }}
    </p>
</div>