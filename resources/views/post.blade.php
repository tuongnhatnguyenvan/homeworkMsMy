<div>
    <h1>Create Post</h1>

    <form action="{{ route('post.add') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <button type="submit">Create Post</button>
        </div>
    </form>
</div>

