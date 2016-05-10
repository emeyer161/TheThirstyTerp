<form action="/comments" method="POST">
	<fieldset class="form-group">
	    <label for="body">New Comment</label>
	    <textarea class="form-control" name="body" id="body" rows="2"></textarea>
	</fieldset>

    <input type="hidden" name="user_id" value="{{Auth::user()['id']}}">
	<input type="hidden" name="post_id" value="{{$post['id']}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<button type="submit" class="btn btn-primary btn-large">Submit</button>
</form>