<?php

namespace App\Domain\Model;

use App\Domain\AbstractDomain;
use App\Domain\Model\Repository\Contract\{{ClassName}}RepositoryInterface;
use Carbon\Carbon;

class {{ClassName}}Model extends AbstractDomain
{
    /**
     * @param $project
     * @param array $search
     * @return array
     * @throws \Exception
     */
    public function search($project, array $search)
    {
        $search = $this->container->make({{ClassName}}RepositoryInterface::class)->search($project, $search);
        if (empty($search)) {
            throw new \Exception("Could not found results to show", 404);
        }
        return $search;
    }
    
	/**
     * @param $project
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getById($project, int $id)
    {
        return $this->container->make({{ClassName}}RepositoryInterface::class)->getById($project, $id);
    }
	
    /**
     * @param string $project
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function create(string $project, array $params)
    {
        return $this->container->make({{ClassName}}RepositoryInterface::class)->create($project, $params);
    }
    
    /**
     * @param $project
     * @param $id
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function update($project, $id, array $params)
    {
        $this->getById($project, $id);
        return $this->container->make({{ClassName}}RepositoryInterface::class)->update($project, $id, $params);
    }
	
	/**
     * @param $project
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function delete($project, int $id) {
        $data = $this->container->make({{ClassName}}RepositoryInterface::class)->delete($project, $id);
        return $data;
    }
}
