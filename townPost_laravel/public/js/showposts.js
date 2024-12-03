$(document).ready(function () {
    // Trigger the AJAX request when the page is ready or on a specific event
    $.ajax({
        url: '/test/posts/retrieve',  // The URL of your route to fetch posts
        type: 'GET',
        success: function (data) {
            // If data is received, process it and display it in the DOM
            if (data.length > 0) {
                var postsHtml = '';
                // Loop through each post and build the HTML
                $.each(data, function (index, post) {
                    postsHtml += `
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">${post.title}</h5>
                                <p>Posted on: ${post.date_posted} by ${post.username}</p>
                                <p>Category: ${post.name}</p>
                            </div>
                            <div class="card-body">
                                <p>${post.content}</p>
                                <button class="btn btn-warning editPosts" id="${post.id}">Edit</button>
                            </div>
                        </div>
                    `;
                });

                // Insert the generated HTML into the content area
                $('#contentRetrieve').html(postsHtml);
            } else {
                // If no posts, show a message
                $('#contentRetrieve').html('<p>No posts to display.</p>');
            }
        },
        error: function () {
            // Handle errors if the request fails
            $('#contentRetrieve').html('<p>Error fetching posts. Please try again later.</p>');
        }
    });
});