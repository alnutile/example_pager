<?php
/**
 * Created by PhpStorm.
 * User: alfrednutile
 * Date: 9/28/14
 * Time: 9:26 AM
 */

namespace App\Transformers;


use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

abstract class TransformerFactory implements TransformerInterface {

    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var Manager
     */
    private $fractal;

    public function __construct(Manager $fractal)
    {

        $this->fractal = $fractal;
    }

    public function getCollection($data, $callback)
    {
        if($this->collection == null)
        {
            $this->setCollection($data, $callback);
        }
        return $this->collection;
    }

    public function setCollection($data, $callback)
    {
        $this->collection = new Collection($data, $callback);
    }

    abstract function collectionCallback($data);

    public function createData($resource)
    {
        $resources = $this->fractal->createData($resource)->toArray();
        return $resources['data']; //Our ResponseHelper puts data into a data key so we just return data here
    }
}