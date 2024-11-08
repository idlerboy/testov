<x-app-layout>
    <div class="container mt-5">
        <h1 class="mb-4">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <small class="text-muted">Posted by: {{ $post->user->name }}</small>
        
        <div class="mt-4">
            @if (Auth::check() && Auth::user()->id === $post->user_id)
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            @endif

            <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm">Back to Posts</a>
        </div>
    </div>
</x-app-layout>
