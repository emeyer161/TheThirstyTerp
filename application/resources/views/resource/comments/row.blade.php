<div class="blog-post-meta">
    @can('delete-comment', $comment)
    	<div style="float:right">
			@include('resource.delete-button', array('url' => action('Client\CommentsController@destroy', ['id' => $comment->id]) ))
    	</div>
    @endcan
	<h4>{{ $comment->user->user_name.' on '.date('F d, g:ia', strtotime($comment->created_at)) }}</h4>

	<p style="margin-left:15px">{{ $comment['body'] }}</p>
    
</div>
<hr>