<tr>
    <td>
        <a class="div-link" href={{ action(($cms ?'Cms' :'Client').'\PostsController@show', ['slug' => $post['slug']]) }} role="button">
            <div class='col-xs-3'>
                <img src={{"/img/posts/".$post['slug'].".png"}} style="max-width:100%"/>
            </div>
            <div class='col-xs-9'>
                <h2>{{ $post['title'] }}</h2>
                <h4>{{ $post['user']['user_name'] . ' | ' .  date('F d, g:ia', strtotime($post['created_at'])) }}</h4>
                <p>{!! (strlen($post['body'])>255) ? substr(strip_tags($post['body']), 0, 255) : strip_tags($post['body']) !!}</p>
            </div>
        </a>
    </td>
    @if ($cms == true)
        <td class="rowlink-skip">
            @can('features')
                <a class="btn btn-warning btn-large" href={{ action('Cms\FeaturesController@featurePost', ['slug' => $post['slug']]) }} role="button"><span class="glyphicon glyphicon-star"></a>
            @endcan
        </td>
        @can('change-post', $post['id'])
            <td class="rowlink-skip">
                <a class="btn btn-default btn-large" href={{ action('Cms\PostsController@edit', ['slug' => $post['slug']]) }} role="button">Edit Post &raquo;</a>
            </td>
            <td class="rowlink-skip">
               @include('resource.delete-button', array('url' => action('Cms\PostsController@delete', ['id' => $post['id']]) ))
            </td>
        @else
            <td></td>
            <td></td>
        @endcan
    @endif
</tr>