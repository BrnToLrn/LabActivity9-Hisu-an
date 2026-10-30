@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">{{ $title }}</h1>
            <p class="text-sm text-slate-500 mt-1">Complete calendar of vaccination schedules</p>
        </div>
        <div>
            <a href="/dashboard" class="inline-flex items-center px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-semibold rounded-lg transition">
                &larr; Back to Dashboard
            </a>
        </div>
    </div>

    <x-panel title="All Purok Vaccine Appointments">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-500 uppercase tracking-wider text-xs">
                        <th class="py-3 px-4 font-semibold">#</th>
                        <th class="py-3 px-4 font-semibold">Patient Name</th>
                        <th class="py-3 px-4 font-semibold">Purok</th>
                        <th class="py-3 px-4 font-semibold">Vaccine</th>
                        <th class="py-3 px-4 font-semibold">Dose</th>
                        <th class="py-3 px-4 font-semibold">Date</th>
                        <th class="py-3 px-4 font-semibold text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($schedules as $item)
                        <tr class="{{ $loop->odd ? 'bg-white' : 'bg-slate-50/60' }} hover:bg-indigo-50/40 transition">
                            <td class="py-3 px-4 text-slate-400 font-mono text-xs">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 font-medium text-slate-900">{{ $item->patient_name }}</td>
                            <td class="py-3 px-4 text-slate-600">{{ $item->purok }}</td>
                            <td class="py-3 px-4 font-semibold text-indigo-700">{{ $item->vaccine }}</td>
                            <td class="py-3 px-4 text-slate-600">{{ $item->dose }}</td>
                            <td class="py-3 px-4 text-slate-600">{{ \Carbon\Carbon::parse($item->scheduled_at)->format('M d, Y') }}</td>
                            <td class="py-3 px-4 text-center">
                                @if ($item->status === 'Done')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">Done</span>
                                @elseif ($item->status === 'Overdue')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-100 text-rose-800">Overdue</span>
                                @else
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">{{ $item->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400 italic">No schedules yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
</div>
@endsection

