<div class="bg-white border border-blue-400 rounded-lg px-8 py-4 mb-4">
    <form method="POST" action="/post">
        @csrf
        <textarea 
            name="body"
            class="w-full border-0"
            placeholder="Post something..." 
            required
        ></textarea>

        <hr class="my-4">
        <footer class="flex justify-between">
            <img 
                src="{{ current_user()->avatar }}" 
                alt=""
                class="rounded-full mr-2"
                width="40"
                height="40"
            >
            <button 
                type="submit" 
                class="bg-blue-400 rounded-lg shadow py-2 px-6 text-white hover:bg-blue-500"
            >
                Post
            </button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-bold text-sm pt-2">{{ $message }}</p>   
    @enderror
</div>