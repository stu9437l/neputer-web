<?php

namespace Neputer\Traits;

/**
 * Trait CrudTrait
 * @package Neputer\Traits
 */
trait CrudTrait
{

    /**
     * @param array $data
     * @param $search
     * @param string $key
     * @return mixed
     */
    public function createOrUpdate( array $data, $search, string $key = 'title')
    {
        return $this->model->updateOrCreate(
            [ $key => $search ],
            $data
        );
    }

    /**
     * @param $property
     *
     * @return mixed
     */
    public function find( $property )
    {
        return $this->model
            ->where('id', $property)
            ->orWhere('slug', $property)
            ->firstOrFail();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function new( array $data )
    {
        return $this->model->create( $data );
    }

    /**
     * @param array $data
     * @param $model
     * @return mixed
     */
    public function update( array $data, $model)
    {
        $instance = $model;
        $model->update( $data );

        return $instance;
    }

    /**
     * @param $key
     * @param $data
     * @return mixed
     */
    public function save( $key = 'name', array $data = [])
    {
        return $this->model->updateOrCreate(
            ["{$key}" => $data[$key]],
            $data);

    }

    /**
     * @param null $paginate
     * @return mixed
     */
    public function get( $paginate = null )
    {
        $that = $this->model;


        if (is_null($paginate)) {

            return $that->latest()
                ->get();
        }

        return $that->latest()->paginate($paginate);
    }

    /**
     * @param $model
     * @return bool
     */
    public function destroy($model)
    {
        $model->delete();

        return true;
    }

    /**
     * @param null $prepend
     * @param null $append
     * @return mixed
     */
    public function pluckEntity( $prepend = null, $append = null, string $key = 'name' )
    {
        $model = $this->model->pluck($key, 'id');
        if (is_null($append))
            return $model;
        return $model->prepend( $prepend, 0 );
    }

    public function query()
    {
        return $this->model->query();
    }

}
