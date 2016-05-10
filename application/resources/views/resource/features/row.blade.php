<tr>
    <td>
        <div class='col-xs-3'>
            <img src={{ url('/'.$feature['img_filename']) }} style="max-width:100%"/>
        </div>
        <div class='col-xs-9'>
            <h2>{{ $feature['title'] }}</h2>
            @if(isset($feature->post))
                <h4>Post: {{$feature->post->title}}</h4>
            @else
                <h4>External: {{$feature->link_url}}</h4>
            @endif
            <h5>{{ date('F d, g:ia', strtotime($feature['created_at'])) }}</h5>
            <p>{{ $feature['description'] }}</p>
        </div>
    </td>
    <td class="rowlink-skip">
        @can('feature')
            <a class="btn btn-default btn-large" href={{ action('Cms\FeaturesController@edit', ['id' => $feature['id']]) }} role="button">Edit Feature &raquo;</a>
        @endcan
    </td>
    <td class="rowlink-skip">
        @can('feature')
	       @include('resource.general.delete-button', array('url' => action('Cms\FeaturesController@delete', ['id' => $feature['id']]) ))
        @endcan
    </td>
</tr>