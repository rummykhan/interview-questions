<?php


namespace App\Structure;


class Engine
{
    protected $name = 'M1';

    protected $turbine;

    public function __construct(Turbine $turbine)
    {
        $this->turbine = $turbine;
    }
}
