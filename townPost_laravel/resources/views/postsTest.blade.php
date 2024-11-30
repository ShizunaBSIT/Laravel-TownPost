<html>
    <head>

    </head>
    <body>
        <table>
            <tr>
                <th>Posted by</th>
                <th>Title</th>
                <th>content</th>
                <th>Posted on</th>
            </tr>

        @foreach ($posts as $post)
            <tr>
                <td>{{$post->user_ID}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->date_posted}}</td>
            </tr>
        @endforeach


    </body>
</html>
