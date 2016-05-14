<div class="well sidebar-nav">
    <ul class="nav nav-list">
        <li class="nav-header">Posts</li>
            <li><a href={{ action('Cms\PostsController@index') }} class="active">List All</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sort Tags <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach($tags as $tag)
                        <li><a href={{ action('Cms\PostsController@getAllWithTag', array('tag' => $tag['id'])) }}>{{ $tag['name'] }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href={{ action('Cms\PostsController@create') }}>Create</a></li>
        <li class="nav-header">Features</li>
            <li><a href={{ action('Cms\FeaturesController@index') }}>List All</a></li>
            @can('features')
                <li><a href={{ action('Cms\FeaturesController@create') }}>Create External</a></li>
            @endcan
        <li class="nav-header">Users</li>
            <li><a href={{ action('Cms\UsersController@show', ['id' => Auth::user()['id']]) }}>{{Auth::user()->user_name}}</a></li>
            <li><a href={{ action('Cms\UsersController@index') }}>List All</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sort Roles <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach($roles as $role)
                        <li><a href={{ action('Cms\UsersController@indexOfRole', array('role' => $role['id'])) }}>{{ $role['name'] }}</a></li>
                    @endforeach
                </ul>
            </li>
            <!-- <li><a href='#'>New</a></li> -->
    </ul>
</div><!--/.well -->