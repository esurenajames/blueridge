<div>
    <div class="ml-5 mr-5">
        @foreach ($breadcrumbs as $breadcrumb)
        <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">{{ $breadcrumb['name'] }}</h2>
        <div class="text-gray-600 pl-6 pb-6">
            <a href="#" class="text-indigo-700 hover:underline">Home</a> >
          
                @if ($loop->last)
                    <span>{{ $breadcrumb['name'] }}</span>
                @else
                    > <a href="{{ $breadcrumb['href'] }}" class="text-indigo-700 hover:underline">{{ $breadcrumb['name'] }}</a>
                @endif
            @endforeach
        </div>
    </div>
</div>
