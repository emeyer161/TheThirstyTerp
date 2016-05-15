<div class="blog-post-meta">
	<h4>{{ $comment->user->user_name.' on '.date('F d, g:ia', strtotime($comment->created_at)) }}</h4>

	<p>{{ $comment['body'] }}</p>
    
    @can('delete-comment', $comment)
		@include('resource.delete-button', array('url' => action('Client\CommentsController@destroy', ['id' => $comment->id]) ))
    @endcan
</div>
<hr>