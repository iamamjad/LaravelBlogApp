<x-layout>
<x-card class=" p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Create a Post
        </h2>
        <p class="mb-4">Create a New Post</p>
    </header>

    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Post Title</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{old('title')}}" name="title" placeholder="Example: Senior Laravel Developer"/>
            @error('title')
            <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags (Comma Separated)
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full"  value="{{old('tags')}}" name="tags" placeholder="Example: Laravel, Backend, Postgres, etc"
            />
            @error('tags')
            <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">
                Post Picture/Logo
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo"/>
            @error('logo')
            <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">Post Description</label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" value="{{old('description')}}" rows="10"
                      placeholder="Include tasks, requirements, salary, etc"
            ></textarea>
            @error('description')
            <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"> Create Gig </button>
            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
</x-layout>
