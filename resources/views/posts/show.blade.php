<x-layout>
@include('partials._hero')
@include('partials._search')

<a href="{{route('post.index')}}" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <x-card class="p-10">
        <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6" src="{{$post->logo ? asset('storage/'.$post->logo):asset('images/no-image.png')}}"
                alt=""/>

            <h3 class="text-2xl mb-2">{{$post->title}}</h3>
            <div class="text-xl font-bold mb-4">Acme Corp</div>
            <x-post-tags :tagsCsv="$post->tags"/>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Post Description
                </h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{$post->description}}
                    </p>
                </div>
            </div>
        </div>
    </x-card>
    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="{{route('post.edit',['id'=>$post->id])}}">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>
        <form method="post" action="{{route('post.destroy',['id'=>$post->id])}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
        </form>
    </x-card>
</div>
</x-layout>
