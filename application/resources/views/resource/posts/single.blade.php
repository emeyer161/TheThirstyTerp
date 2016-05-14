<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="blog-post">
	<h1 class="blog-post-title"><b>{{ $post['title'] }}</b></h1>
	@if( in_array('Video', $post['tagsClean']) && $post['video_id'] )
		<div style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%;">
			<iframe id="ytplayer" type="text/html" style="position: absolute; width: 100%; height: 100%;"
				src="http://www.youtube.com/embed/{{$post['video_id']}}" frameborder="0"></iframe>
		</div>
	@else
		<div style="max-height:500px; overflow:hidden">
			<img class="img-responsive" style="width:100%" src="{{ '/img/posts/'.$post['slug'].'.png' }}" />
		</div>
	@endif

	<h4 class="blog-post-meta">
		{{ date('F d, Y, g:ia', strtotime($post['created_at'])) }}
		<div style="float:right" class="fb-share-button" data-href="{{Request::url()}}" data-layout="button_count" data-mobile-iframe="true"></div>
	</h4>
	<h4 class="blog-post-meta">{{ 'By '.$post['user']['user_name'] }} </h4>
	<!-- <h5 class="blog-post-meta">{{ implode(', ', $post['tagsClean']) }}</h5> -->

	<hr>

	<div style='overflow-wrap: break-word; word-wrap: break-word;'>
		{!! $post['body'] !!}
	</div>
</div>