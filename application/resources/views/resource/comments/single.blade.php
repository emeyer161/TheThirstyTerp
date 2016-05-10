<div class="blog-post-meta">
	<h4>{{ $comment['user']['user_name'].' on '.date('F d, g:ia', strtotime($comment['created_at'])) }}</h4>

	<p>{{ $comment['body'] }}</p>
    
    @if($comment['user']['id'] == Auth::user()['id'])
        {!! Form::open(array('url' => "/comments/".$comment['id'], 'method' => 'DELETE')) !!}
            <button type="submit" class="btn btn-xs btn-danger">Delete</button>
        {!! Form::close() !!}
    @endif

</div>
<hr>