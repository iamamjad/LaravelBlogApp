@props(['post'])
    <x-card>
        <div class="flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="{{$post->logo ?asset('storage/'.$post->logo):asset('images/no-image.png')}}"
                alt=""
            />
            <div>
                <h3 class="text-2xl">
                    <a href="{{route('post.show',['id'=>$post->id])}}">{{$post->title}}</a>
                </h3>
                <div class="text-xl font-bold mb-4">
                    Stark Industries
                </div>
                <x-post-tags :tagsCsv="$post->tags"/>
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i>
                    Lawrence, MA
                </div>
            </div>
        </div>
    </x-card>


