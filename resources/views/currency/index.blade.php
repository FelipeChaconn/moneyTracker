<x-app>
    <div class="relative mb-3">
        <a href="" class="btn btn-success absolute top-0 right-0 rounded-full">Add currency</a>
    </div>

    <div>
        <p class="text-white text-xl text-bold mb-3">My currencies</p>

        @forelse ($currencies as $currency)
            <div class="card rounded-lg mr-2 mb-2" style="width: 9rem">
                <div class="card-body flex items-center">
                    <div class="mr-2 flex-shrink-0">
                        <img src="{{ $currency->symbol }}" alt="symbol" width="42" height="42" class="mr-2">
                    </div>

                    <div>
                        <p class="text-white font-bold mr-2">
                            {{ $currency->description }}
                        </p>
                        <p class="text-white font-bold mr-2">
                            {{ $currency->rate }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-white text-xl text-bold">No currencies yet</p>
        @endforelse
    </div>
</x-app>