<div>
    <h1>Update Post</h1>

    <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required>{{ $post->description }}</textarea>
        </div>
        <div>
            <button type="submit">Update Post</button>
        </div>
    </form>
</div>
