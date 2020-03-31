<?php

namespace App\Domain;

use Psr\Container\ContainerInterface;


abstract class AbstractDomain
{
    /**
     * This is actually our Application
     *
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
