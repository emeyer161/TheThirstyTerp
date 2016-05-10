<?php namespace App\Repositories;

use Illuminate\Http\Response;

abstract class Repository
{
    public function create(array $data)
    {
        return $this->model::create( $data );
    }

    public function getAll()
    {
        return $this->model::all();

    }

    public function getById($id)
    {
        return $this->model::find( $id );
    }

    public function update(array $data, $id)
    {
        $this->model::find($id)->fill( $data )->save();
        return $this->model::find( $id );
    }

    public function delete($model)
    {
        $model->delete();
        return response()->json(true);
    }

    public function destroy($id)
    {
        $this->model::destroy( $id );
        return response()->json(true);
    }
}