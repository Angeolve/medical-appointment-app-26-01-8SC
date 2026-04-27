@props (['tab', 'error' => false])
<div x-show="tab === '{{ $tab }}'" style="display: none;"
    {{ $slot }}
></div>







<li class="me-2">
  <a href="#" x-on:click="tab = '{{ $tab }}'"
    class="inline-flex p-4 rounded-t-lg border-b-2"
    :class="tab === '{{ $tab }}' ? 'text-blue-600 border-blue-600 active' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
    aria-current="page">
    {{ $slot }}
    @if ($error)
      <span class="ml-1 text-red-500">*</span>
    @endif
  </a>