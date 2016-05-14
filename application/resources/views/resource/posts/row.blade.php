<tr>
    <td>
        <a class="div-link" style="display:block" href={{ action(($cms ?'Cms' :'Client').'\PostsController@show', ['slug' => $post['slug']]) }} role="button">
            <div class='col-sm-3 col-xs-12'>
                <img src={{"/img/posts/".$post['slug'].".png"}} style="width:100%"/>
            </div>
            <div class='col-sm-9 col-xs-12'>
                <h2>
                    {{ $post['title'] }}
                </h2>
                <h4>{{ $post['user']['user_name'] . ' | ' .  date('F d, g:ia', strtotime($post['created_at'])) }}</h4>
                @if ($cms == true)
                    <div style="display:block">
                        @can('features')
                            <a href={{ action('Cms\FeaturesController@featurePost', ['slug' => $post['slug']]) }} role="button"><button class="btn btn-warning btn-large"><span class="glyphicon glyphicon-star"></button></a>
                        @endcan
                        @can('change-post', $post['id'])
                            <a href={{ action('Cms\PostsController@edit', ['slug' => $post['slug']]) }} role="button"><button class="btn btn-default btn-large"><span class="glyphicon glyphicon-pencil"></button></a>
                           @include('resource.delete-button', array('url' => action('Cms\PostsController@delete', ['id' => $post['id']]) ))
                        @endcan
                    </div>
                @else
                    <p style='overflow-wrap: break-word; word-wrap: break-word;'>
                        {!! (strlen($post['body'])>255) ? substr(strip_tags($post['body']), 0, 255) : strip_tags($post['body']) !!}
                    </p>
                @endif
            </div>
        </a>
    </td>
</tr>