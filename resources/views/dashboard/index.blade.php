@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">{{ $title }}</h1>
            <p class="text-sm text-slate-500 mt-1">Barangay Matina Crossing Health Center &bull; Vaccination Desk</p>
        </div>
        <div>
            <a href="/schedule" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition">
                View Full Schedule &rarr;
            </a>
        </div>
    </div>

    {{-- Requirement 5: @if / @elseif / @else Alert Banner + @unless --}}
    @if ($alerts->count() > 0)
        <div class="p-4 rounded-xl border border-rose-200 bg-rose-50 text-rose-800 flex items-start gap-3">
            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-rose-600 text-white text-xs font-bold shrink-0">!</span>
            <div>
                <strong class="font-semibold">Attention Needed:</strong>
                There {{ $alerts->count() === 1 ? 'is' : 'are' }} {{ $alerts->count() }} overdue {{ $alerts->count() === 1 ? 'vaccination' : 'vaccinations' }} requiring immediate follow-up.
            </div>
        </div>
    @elseif ($schedules->isEmpty())
        <div class="p-4 rounded-xl border border-amber-200 bg-amber-50 text-amber-800">
            <strong>Notice:</strong> No vaccination records registered in the system.
        </div>
    @else
        <div class="p-4 rounded-xl border border-indigo-200 bg-indigo-50 text-indigo-800">
            <strong>All clear:</strong> All vaccinations for this purok are up to date!
        </div>
    @endif

    {{-- Requirement 8 & 9: Component stat-cards in responsive grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($stats as $stat)
            <x-stat-card :title="$stat['label']" :value="$stat['value']" />
        @endforeach
    </div>

    {{-- Requirement 8: Slotted component <x-panel> --}}
    <x-panel title="Upcoming & Recent Vaccinations">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-500 uppercase tracking-wider text-xs">
                        <th class="py-3 px-4 font-semibold">#</th>
                        <th class="py-3 px-4 font-semibold">Patient Name</th>
                        <th class="py-3 px-4 font-semibold">Purok</th>
                        <th class="py-3 px-4 font-semibold">Vaccine</th>
                        <th class="py-3 px-4 font-semibold">Dose</th>
                        <th class="py-3 px-4 font-semibold">Scheduled Date</th>
                        <th class="py-3 px-4 font-semibold text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    {{-- Requirement 6: @forelse with $loop --}}
                    @forelse ($schedules as $item)
                        <tr class="{{ $loop->odd ? 'bg-white' : 'bg-slate-50/60' }} hover:bg-indigo-50/40 transition">
                            <td class="py-3 px-4 text-slate-400 font-mono text-xs">
                                {{ $loop->iteration }}
                            </td>
                            <td class="py-3 px-4 font-medium text-slate-900">
                                {{ $item->patient_name }}
                            </td>
                            <td class="py-3 px-4 text-slate-600">
                                {{ $item->purok }}
                            </td>
                            <td class="py-3 px-4 font-semibold text-indigo-700">
                                {{ $item->vaccine }}
                            </td>
                            <td class="py-3 px-4 text-slate-600">
                                {{ $item->dose }}
                            </td>
                            <td class="py-3 px-4 text-slate-600">
                                {{ \Carbon\Carbon::parse($item->scheduled_at)->format('M d, Y') }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if ($item->status === 'Done')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                        Done
                                    </span>
                                @elseif ($item->status === 'Overdue')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-100 text-rose-800">
                                        Overdue
                                    </span>
                                @else
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                                        {{ $item->status }}
                                    </span>
                                @endif

                                {{-- Requirement 5: @unless usage --}}
                                @unless ($item->status === 'Overdue')
                                    {{-- Row is on track --}}
                                @endunless
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400 italic">
                                No schedules yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
</div>
@endsection

