<?php
/**
 * Created by PhpStorm.
 * User: Tiago Gomes
 * Date: 15/03/2020
 * Time: 11:30
 */
return [
    'path' => [
        'domain' => app_path().'/Domain/',
        'abstractDomain' => app_path().'/Domain/',
        'controllerPath' => app_path().'/Http/Controller/',
        'domainModel' => app_path().'/Domain/Model/',
        'repository' => app_path().'/Domain/Model/Repository/',
        'interface' => app_path().'/Domain/Model/Repository/Contract/',
    ],
    'templates' => [
        'controllerPath' =>  __DIR__.'/../Templates/Controller.php',
        'domainModel' =>  __DIR__.'/../Templates/DomainModel.php',
        'abstractDomain' =>  __DIR__.'/../Templates/AbstractDomain.php',
        'interface' =>  __DIR__.'/../Templates/Interface.php',
        'repository' =>  __DIR__.'/../Templates/Repository.php'
    ],
    'fileSuffix' => [
        'domain' => 'Domain.php',
        'controllerPath' =>'Controller.php',
        'domainModel' => 'Model.php',
        'repository' => 'Repository.php',
        'interface' => 'Interface.php',
        'abstractDomain' => 'AbstractDomain.php'
    ],
];