<?php namespace App\Repositories;

use Illuminate\Http\Response;

abstract class Repository
{
    public function create(array $data)
    {
        return static::model()::create( $data );
    }

    public function getAll()
    {
        return static::model()::all();

    }

    public function getById($id)
    {
        return static::model()::find( $id );
    }

    public function update(array $data, $id)
    {
        static::model()::find($id)->fill( $data )->save();
        return static::model()::find( $id );
    }

    public function delete($model)
    {
        $model->delete();
        return response()->json(true);
    }

    public function destroy($id)
    {
        static::model()::destroy( $id );
        return response()->json(true);
    }
}