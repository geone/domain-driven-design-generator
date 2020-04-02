<?php

namespace App\Domain\Model\Repository;

use \Carbon\Carbon;
use App\Domain\Model\Repository\AbstractRepository;
use App\Domain\Model\Repository\Contract\{{ClassName}}RepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class {{ClassName}}Repository
 * @package App\Domain\Model\Repository
 */
class {{ClassName}}Repository extends AbstractRepository implements {{ClassName}}RepositoryInterface
{
    
    /**
     * @var string $table
     */
    private $table = '{{tableName}}';
    
    /**
     * @param string $connection
     * @param array $params
     * @param int $idUser
     * @return array
     */
    public function search(string $connection, array $params): array
	{
    
        $quantity = 15;
        $page = 1;
    
        if (!empty($params)) {
        
            // Applied searching
            if (!empty($params['page'])) {
                $page = $params['page'];
                unset($params['page']);
            }
        
            if (!empty($params['quantity'])) {
                $quantity = $params['quantity'];
                unset($params['quantity']);
            }
        
            if (!empty($params['title'])) {
                $title = $params['title'];
                unset($params['title']);
            }
        
            $search = DB::connection($connection)
              ->table($this->table);
        
            if (!empty($title)) {
                $search->where('name',  'like',$title.'%');
            }
        
            $search
              ->orderBy('txName', 'asc');
        
        
        } else {
        
            $search = DB::connection($connection)
              ->table($this->table)
              ->orderBy('name', 'asc');
        }
    
        $maxItems = $search->get()->count();
    
        $simpleSearch = $search
          ->simplePaginate($quantity, ['*'], 'page', $page);
    
        $items['quantity'] = $quantity;
        $items['page'] = $simpleSearch->currentPage();
        $items['count'] = $simpleSearch->lastItem();
        $items['totalItems'] = $maxItems;
        $items['items'] = $simpleSearch->items();
        
        return $items;
    }
     
    /**
     * @param string $connection
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function create(string $connection, array $params): array 
	{
        $id = DB::connection($connection)
          ->table($this->table)
          ->insertGetId($params);
        if (!empty($id)) {
            return $this->getById($connection,$id);
        }
    }
    
    /**
     * @param string $connection
     * @param int $id
     * @param int $idUser
     * @return array
     */
    public function getById(string $connection, int $id, int $idUser): array
	{
        $data = DB::connection($connection)
          ->table($this->table)
          ->where(['id'=>$id])
          ->limit(1)
          ->get()
          ->map(function ($item) {
              return (array) $item;
          })
          ->toArray();
        if (!empty($data)) {
            return $data[0];
        }
        return [];
    }
    
    /**
     * @param string $connection
     * @param int $id
     * @param array $params
     * @param int $idUser
     * @return array
     * @throws Exception
     */
    public function update(string $connection, int $id, int $idUser, array $params): array
	{
        $data = $this->getById($connection,$id, $idUser);
        if (empty($data)) {
            throw new \Exception("{{ClassName}} does not exist.", 404);
        }
        $isUpdated = DB::connection($connection)
          ->table($this->table)
          ->where('nID', $id)
          ->update($params);
        if ($isUpdated) {
            return $this->getById($connection,$id);
        }
        return $data;
    }
    
    /**
     * @param string $connection
     * @param int $id
     * @param int $idUser
     * @return bool
     */
    public function delete(string $connection, int $id, int $idUser): bool
    {
        return DB::connection($connection)
            ->table($this->table)
            ->where(['id' => $id])
            ->delete();
    }

}
