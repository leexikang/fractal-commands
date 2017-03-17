<?php

namespace Min\FractalCommands\Traits;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

trait Fractal{
    private $fractal;

    /**
     * @param mixed $fractal
     */

    public function loadFractal()
    {
        $this->fractal = new Manager();
    }

    public function transform($data, $transformer)
    {    
        $resource = new Collection($data, $transformer);
        return $data = $this->fractal->createData($resource)->toJson();
    }


    public function transformItem($data, $transformer)
    {    
        $resource = new Item($data, $transformer);
        return $data = $this->fractal->createData($resource)->toJson();
    }

}