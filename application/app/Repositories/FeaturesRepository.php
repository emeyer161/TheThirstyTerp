<?php namespace App\Repositories;

use App\Feature;

class FeaturesRepository extends Repository
{
	public function __construct()
	{
		// $this->model = Feature::class;
        $this->model ='App\Feature';
	}

	public function getAllClean()
    {
        return $this->_featuresRelationships()
                    ->orderBy('updated_at', 'desc')->get();
    }

    public function getByIdClean($id)
    {
        return $this->_featuresRelationships()
                    ->where('id', $id)
                    ->first();
    }

    function _featuresRelationships()
    {
        return Feature::with([
                    'post'=>function($query){
                        $query->select('id','title', 'description', 'slug');
                    }
                ]);
    }
}