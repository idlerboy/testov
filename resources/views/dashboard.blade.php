<x-app-layout>
    <div class="container mt-5">
        <h1 class="mb-4">All Posts</h1>

        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                            <small class="text-muted">Posted by: {{ $post->user->name }}</small>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">View Post</a>

                            @if (Auth::check() && Auth::user()->id === $post->user_id)
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
