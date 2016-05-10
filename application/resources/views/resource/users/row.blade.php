<tr>
    <td><a href={{ action('Cms\UsersController@show', array('id' => $user['id']))}}>{{ $user['user_name'] }}</a></th>
    <td>{{ $user['first_name'].' '.$user['last_name'] }}</th>
    <td>{{ $user['email'] }}</th>
    @if ($cms == true)
        <td class="rowlink-skip" style="width:170px; min-width:170px">
            @can('update-user-role', array('user2' => $user))
                {!! Form::open(array('action' => array('Cms\UsersController@update', $user['id']), 'method' => 'put' )) !!}
                    <div class="input-group">
                        <select class="c-select form-control" name="role_id">
                            @foreach($roles as $role)
                                <option {{$user['role']['name']==$role['name'] ?'selected' :null}} value="{{$role['id']}}">{{$role['name']}}</option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-success" type="button"><span class="glyphicon glyphicon-ok"></span></button>
                        </span>
                    </div>
                {!! Form::close() !!}
            @else
                {{ $user['role']['name'] }}
            @endcan
        </td>
    	<td class="rowlink-skip">
    		@can('destroy-user', array('user2' => $user))
		    	@include('resource.general.delete-button', array('url' => action('Cms\UsersController@delete', ['id' => $user['id']]) ))
			@endcan
		</td>
    @else
        <td>{{ $user['role']['name'] }}</th>
	@endif
</tr>