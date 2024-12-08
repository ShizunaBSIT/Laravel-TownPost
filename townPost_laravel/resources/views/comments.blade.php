<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post Comments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container">
    <!--the error here is that $post and $comment is not recognized as well the basis of nat is that upon clicking the comment button
    it will be redirected to this page and the comment will be saved in the database-->
    <h2>Comments for Post: {{ $post[0]->title }}</h2>

    <!-- Add Comment -->
    <form action="{{ route('comments.create') }}" method="POST">
        @csrf
        <input type="hidden" name="post_ID" value="{{ $post[0]->post_ID }}">
        <input type="hidden" name="user_ID" value="{{ Auth::id() }}">
        <div class="mb-3">
            <label for="content" class="form-label">Comment:</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
    <!-- Display Comments -->
    <div class="mt-4">
        @foreach($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">User ID: {{ $comment->user_ID }}</h5>
                <p class="card-text">{{ $comment->content }}</p>

                <!-- Edit Comment -->
                <form action="{{ route('comments.update') }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="commentID" value="{{ $comment->comment_ID }}">
                    <textarea class="form-control mb-2" name="content">{{ $comment->content }}</textarea>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>

                <!-- Delete Comment -->
                <form action="{{ route('comments.delete', $comment->comment_ID) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>
