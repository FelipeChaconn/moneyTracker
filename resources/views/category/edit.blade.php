<x-app>
    <form
        class="col-lg-6 ml-48"
        method="POST" 
        action="/categories/{{ $category->id }}"
        enctype="multipart/form-data"
    >
    @csrf
    @method('PATCH')

    <h1 class="text-white tecxt-bold text-xl text-center mb-5">Edit category</h1>
    
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="name"
        >
            Name
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="name" 
            id="name"
            value="{{ $category->name }}"
            required
        >

        @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="father_cat"
        >
            Father category
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="father_cat" 
            id="father_cat"
            value="{{ $category->father_cat }}"
            required
        >

        @error('father_cat')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label 
            for="type" 
            class="block mb-2 uppercase font-bold text-xs text-white"
        >
            Category type
        </label>

        <div class="select control">
            <select 
                id="type"
                name="type"
                class="custom-select"    
            >
                <option
                    {{ $category->type != 'income' ? '' : 'selected="selected' }}
                    value="income"
                >
                    Income
                </option>
                <option 
                    {{ $category->type != 'expenses' ? '' : 'selected="selected' }}
                    value="expenses"
                >
                    Expenses
                </option>
            </select>

            @error('type')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
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
            value="{{ $category->description }}"
            required
        >

        @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="budget"
        >
            Budget
        </label>

        <input class="border border-white p-2 w-full"
            type="text" 
            name="budget" 
            id="budget"
            value="{{ $category->budget }}"
            required
        >

        @error('budget')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-white" 
            for="icon"
        >
            Icon
        </label>


        <div class="custom-file">
            <input class="border text-white border-white p-2 w-full custom-file-input"
                type="file" 
                name="icon" 
                id="icon"
                accept="image/*"
            >
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>

        @error('icon')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button type="submit"
                class="bg-green-400 text-white rounded-full py-2 px-4 hover:bg-green-500 mr-4"
        >
            Submit
        </button>

        <a href="/categories" class="hover:underline text-white">Cancel</a>
    </div>

    </form>
</x-app>