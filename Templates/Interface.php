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
     * @return array
     */
    public function search(string $connection, array $params): array;
    
    /**
     * @param string $connection
     * @param array|null $params
     * @return array
     */
    public function create(string $connection, array $params): array;
    
    /**
     * @param string $connection
     * @param int $id
     * @param array $params
     * @return array
     */
    public function update(string $connection, int $id, array $params): array;
    
    /**
     * @param string $connection
     * @param int $id
     * @return array
     */
    public function getById(string $connection, int $id): array;
	
	/**
     * @param string $connection
     * @param int $id
     * @return bool
     */
	public function delete(string $connection, int $id): bool;
}
