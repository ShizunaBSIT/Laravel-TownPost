$(document).ready(function(){
    //when the button like is click
    $(document).on('click', '#like-button', function (){
        var reaction = $(this).attr('id').split('-')[1];
        var post_id = $(this).attr('id').split('-')[2];
        var user_id = $(this).attr('id').split('-')[3];
        var reaction_count = $(this).attr('id').split('-')[4];
        var reaction_type = $(this).attr('id').split('-')[5];
        var reaction_count = parseInt(reaction_count);
        var reaction_type = reaction_type == 'like' ? 'dislike' : 'like';
        var reaction_count = reaction_count == 1 ? 0 : reaction_count - 1;
        var reaction_type = reaction_type == 'like' ? 'dislike' : 'like';
        var reaction_count = reaction_count == 0 ? 1 : reaction_count + 1;
    })
})