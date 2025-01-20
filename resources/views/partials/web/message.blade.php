@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        {{ session('error') }}
    </div>
@endif
@if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <strong class="font-medium">Whoops!</strong> There were some problems with your input:
        <ul class="mt-2 list-disc list-inside text-red-600">
            @foreach ($errors->all() as $error)
                <li class="text-red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
