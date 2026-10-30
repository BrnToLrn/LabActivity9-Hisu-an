@props(['title' => null])

<div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
    @if ($title)
        <div class="px-6 py-4 bg-slate-50/75 border-b border-slate-200">
            <h3 class="font-bold text-slate-800 text-base">{{ $title }}</h3>
        </div>
    @endif
    <div class="p-6">
        {{ $slot }}
    </div>
</div>

