<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('Audits') }}
            </h2>
        </x-slot>

        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                    @if($audits->isEmpty())
        <p>No audit logs found.</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Auditable Type</th>
                    <th class="px-4 py-2 border">Operation</th>
                    <th class="px-4 py-2 border">User</th>
                    <th class="px-4 py-2 border">Created At</th>
                    <th class="px-4 py-2 border">Changes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audits as $audit)
                    <tr>
                        <td class="px-4 py-2 border">{{ $audit->id }}</td>
                        <td class="px-4 py-2 border">{{ $audit->auditable_type }}</td>
                        <td class="px-4 py-2 border">{{ $audit->event }}</td>
                        <td class="px-4 py-2 border">{{ optional($audit->user)->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $audit->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2 border">
                            <pre>{{ json_encode($audit->changes, JSON_PRETTY_PRINT) }}</pre>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
                    </div>
                </div>
            </div>
        </div>

        <x-alert-success>{{ session('success') }}</x-alert-success>
    </x-app-layout>
</div>

