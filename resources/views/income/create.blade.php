<x-app>
    <form
        class="col-lg-6 ml-48"
        method="POST" 
        action="/incomes"
    >
    @csrf

    <h1 class="text-white tecxt-bold text-xl text-center mb-5">Add income</h1>
    
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="date"
        >
            Date
        </label>

        <input class="border border-white p-2 w-full"
            type="date" 
            name="date" 
            id="date"
            required
        >

        @error('date')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="description"
        >
            Description
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="description" 
            id="description"
            required
        >

        @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="amount"
        >
            Amount
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="amount" 
            id="amount"
            required
        >

        @error('amount')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label 
            for="category" 
            class="block mb-2 uppercase font-bold text-xs text-white"
        >
            Category
        </label>

        <div class="select control">
            <select 
                id="category"
                name="category"
                class="custom-select"    
            >
                @forelse ($categories as $category)
                    <option 
                        value="{{ $category->id }}"
                    >
                        {{ $category->name }}
                    </option>
                @empty

                @endforelse
            </select>

            @error('currencies')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="mb-6">
        <label 
            for="account" 
            class="block mb-2 uppercase font-bold text-xs text-white"
        >
            Account
        </label>

        <div class="select control">
            <select 
                id="account"
                name="account"
                class="custom-select"    
            >
                @forelse ($accounts as $account)
                    <option 
                        value="{{ $account->id }}"
                    >
                        {{ $account->name }}
                    </option>
                @empty
                
                @endforelse
            </select>

            @error('currencies')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="mb-6">
        <button type="submit"
                class="bg-green-400 text-white rounded-full py-2 px-4 hover:bg-green-500 mr-4"
        >
            Submit
        </button>

        <a href="/accounts" class="hover:underline text-white">Cancel</a>
    </div>

    </form>
</x-app>