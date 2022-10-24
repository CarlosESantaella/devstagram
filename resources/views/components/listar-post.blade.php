<div>
    @if($posts->count())

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($posts as $post)
                <div>
                    <a href="{{ route('posts.show', [ 'user' => $post->user, 'post' => $post->id]) }}"> {{-- debe ser el mismo nombre de variable que aparece en su respectiva ruta de web.php --}}
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>

    @else

        <p class="text-center ">No hay posts, sigue a alguien para poder ver sus posts aquí</p>

    @endif
</div>