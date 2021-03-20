<?php

namespace App\Container;


use Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionClass;
use ReflectionParameter;

class AppContainer implements ContainerInterface
{
    protected $instances = [];

    public function get(string $id)
    {
        if($this->has($id)){
            return $this->instances[$id];
        }

        $instance = $this->createObject($id);

        $this->instances[$id] = $instance;

        return $instance;
    }

    public function has(string $id)
    {
        return isset($this->instances[$id]);
    }

    public function createObject($className)
    {
        // if this class exists or not
        if(!class_exists($className)){
            throw new Exception("Class: {$className} doesnt exist");
        }

        // if class has a constructor or not
        $reflectionClass = new ReflectionClass($className);

        if($reflectionClass->getConstructor() == null){
            return new $className;
        }

        $parameters = $reflectionClass->getConstructor()->getParameters();

        $dependencies = $this->buildDependencies($parameters);

        return $reflectionClass->newInstanceArgs($dependencies);
    }

    /**
     * @param ReflectionParameter[] $parameters
     *
     * @return array
     */
    public function buildDependencies($parameters)
    {
        $dependencies = [];

        foreach ($parameters as $parameter){
            $dependencies[] = $this->createObject($parameter->getClass()->getName());
        }

        return $dependencies;
    }
}
