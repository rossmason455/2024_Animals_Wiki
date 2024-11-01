@if(session('success'))
<div class="mb-4 px-4 py-2 bg-green-500 text-green-700 rounded-md">
    {{ session('success') }}
</div>
@endif