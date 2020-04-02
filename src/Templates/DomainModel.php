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
     * @param int $idUser
     * @return array
     * @throws Exception
     */
    public function search($project, array $search, int $idUser)
    {
        $search = $this->container->make({{ClassName}}RepositoryInterface::class)->search($project, $search, $idUser);
        if (empty($search)) {
            throw new \Exception("Could not found results to show", 404);
        }
        return $search;
    }
    
    /**
     * @param string $project
     * @param int $id
     * @param int $idUser
     * @return mixed
     */
    public function getById(string $project, int $id, int $idUser)
    {
        return $this->container->make({{ClassName}}RepositoryInterface::class)->getById($project, $id, $idUser);
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
     * @param array $user
     * @return array
     * @throws \Exception
     */
    public function update($project, $id, array $params, int $idUser)
    {
        $this->getById($project, $id, $idUser);
        return $this->container->make({{ClassName}}RepositoryInterface::class)->update($project, $id, $params, $idUser);
    }
    
    /**
     * @param $project
     * @param int $id
     * @param int $idUser
     * @return mixed
     */
    public function delete($project, int $id, int $idUser) {
        $data = $this->container->make({{ClassName}}RepositoryInterface::class)->delete($project, $id, $idUser);
        return $data;
    }
}
