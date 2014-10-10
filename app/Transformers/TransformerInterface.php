<?php namespace App\Transformers;

interface TransformerInterface {

    public function getCollection($data, $callback);
    public function setCollection($data, $callback);
    public function collectionCallback($data);
    public function createData($resource);

}