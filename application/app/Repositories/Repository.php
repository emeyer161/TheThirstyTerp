<?php namespace App\Repositories;

use Illuminate\Http\Response;

abstract class Repository
{
    public function create($data)
    {
        $model = new $this->model;
        return $model::create( $data );
    }

    public function getAll()
    {
        $model = new $this->model;
        return $model::all();

    }

    public function getById($id)
    {
        $model = new $this->model;
        return $model::find( $id );
    }

    public function update($data, $id)
    {
        $model = new $this->model;
        $model::find($id)->fill( $data )->save();
        return $model::find( $id );
    }

    public function delete($instance)
    {
        // $model = new $this->model;
        $instance->delete();
        return response()->json(true);
    }

    public function destroy($id)
    {
        $model = new $this->model;
        $model::destroy( $id );
        return response()->json(true);
    }
}