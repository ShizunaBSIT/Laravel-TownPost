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
            //converts a javascript to json where the
            body: JSON.stringify({ state: currentState })
        });

        if (!response.ok) throw new Error('Failed to like the post.');

        const result = await response.json();

        // if like the button will be fill and change the text to liked.
        if (result.state === 'liked') {
            button.setAttribute('data-state', 'liked');
            button.innerHTML = `<i class="bi bi-hand-thumbs-up-fill"></i> Liked`;
        } else {
        //if like is clicked again it will change its state to unliked and the icons will be back to unfill
            button.setAttribute('data-state', 'unliked');
            button.innerHTML = `<i class="bi bi-hand-thumbs-up"></i> Like`;
        }
    } catch (error) {
        alert('Can`t like posts as of this moment');
    }
};