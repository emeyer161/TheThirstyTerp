<?php namespace App\Repositories;

use App\Comment;

class CommentsRepository extends Repository
{
	public function __construct()
	{
		$this->model = Comment::class;
	}
}