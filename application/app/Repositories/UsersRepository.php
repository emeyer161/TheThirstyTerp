<?php namespace App\Repositories;

use App\User;

class UsersRepository extends Repository
{
	public function __construct()
	{
		$this->model = User::class;
	}

	public function getAll()
	{
		return $this->_usersWithRole()
					->orderBy('role_id', 'asc')
        			->paginate(20);
	}

	public function getAllByRole($roleId)
	{
		return $this->_usersWithRole()
						->where('role_id', $roleId)
						->orderBy('user_name', 'desc')
        				->paginate(20);
	}

	public function getById($id)
	{
		return User::where('id', $id)->get()->first();
	}

	public function getByIdWithPosts($id)
	{
		$user 			= $this->getById($id);
		$user->posts 	= $user->postsPaginated();
		return $user;
	}

	function _usersWithRole()
    {
        return User::with([
                'role'=>function($query){
                    $query->select('id','name');
                }]);
    }
}