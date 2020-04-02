<?php

namespace App\Domain\Model\Repository\Contract;

/**
 * Interface {{ClassName}}RepositoryInterface
 * @package App\Domain\Model\Repository\Contract
 */
interface {{ClassName}}RepositoryInterface
{
    /**
     * @param string $connection
     * @param array $params
     * @param int $idUser
     * @return array
     */
    public function search(string $connection, array $params): array;
    
    /**
     * @param string $connection
     * @param array $params
     * @param int $idUser
     * @return array
     */
    public function create(string $connection, array $params): array;
    
    /**
     * @param string $connection
     * @param int $id
     * @param array $params
     * @param int $idUser
     * @return array
     */
    public function update(string $connection, int $id, array $params): array;
    
   /**
    * @param string $connection
    * @param int $id
    * @param int $idUser
    * @return array
    */
    public function getById(string $connection, int $id, int $idUser): array;
	
	/**
     * @param string $connection
     * @param int $id
     * @param int $idUser
     * @return bool
     */
	public function delete(string $connection, int $id, int $idUser): bool;
}
