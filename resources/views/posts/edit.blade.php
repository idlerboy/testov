<x-app-layout>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Post</h1>
        
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea name="content" id="content" rows="5" class="form-control" required>{{ $post->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
