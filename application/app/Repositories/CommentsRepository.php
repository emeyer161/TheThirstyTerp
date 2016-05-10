<?php namespace App\Repositories;

use App\Comment;

class CommentsRepository extends Repository
{
	// public function __construct()
	// {
	// 	// $this->model = Comment::class;
	// 	$this->model = 'App\Comment';
	// }

	public function model()
    {
        return Comment::class;
    }
}