@props(['title', 'value'])

<div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:shadow-md transition">
    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">{{ $title }}</p>
    <p class="text-3xl font-extrabold text-indigo-700 mt-2">{{ $value }}</p>
</div>

