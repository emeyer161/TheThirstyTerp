<form action="/comments" method="POST">
    <input type="hidden" name="user_id" value="{{Auth::user()['id']}}">
	<input type="hidden" name="post_id" value="{{$post['id']}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="input-group">
	    <input class="form-control" name="body" id="body" placeholder="Add a comment..."></textarea>
	    <span class="input-group-btn">
	        <button type="submit" class="btn btn-success btn-large">Submit</button>
		</span>
	</div>
</form>