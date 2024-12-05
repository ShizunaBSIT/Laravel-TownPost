async function toggleReaction(button) {
    const postId = button.getAttribute('data-post-id');
    const currentState = button.getAttribute('data-state');
    const url = `{{route('post.react')}}`;

    try {
        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ state: currentState })
        });

        if (!response.ok) throw new Error('Failed to like the post.');

        const result = await response.json();

        // if like the button will be fill and change the text to liked.
        if (result.state === 'liked') {
            button.setAttribute('data-state', 'liked');
            button.innerHTML = `<i class="bi bi-hand-thumbs-up-fill"></i> Liked`;
        } else {
            button.setAttribute('data-state', 'unliked');
            button.innerHTML = `<i class="bi bi-hand-thumbs-up"></i> Like`;
        }
    } catch (error) {
        alert('Something went wrong. Please try again.');
    }
};