@props(['status' => ''])

@php
    $statusText = ucwords(strtolower(trim((string) $status)));

    $statusClass = match (strtolower(trim((string) $status))) {
        'aktif' => 'bg-emerald-100 text-emerald-700 border border-emerald-200',
        'tidak aktif', 'nonaktif', 'inactive' => 'bg-red-100 text-red-700 border border-red-200',
        'cuti', 'pending' => 'bg-amber-100 text-amber-700 border border-amber-200',
        default => 'bg-slate-100 text-slate-700 border border-slate-200',
    };
@endphp

<span class="inline-flex items-center rounded-full border px-2.5 py-1 text-xs font-semibold {{ $statusClass }}">
    {{ $statusText }}
</span>