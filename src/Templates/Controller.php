<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Domain\Model\{{ClassName}}Model;
use Illuminate\Http\Request;
use App\Exceptions\ApiException;
use Exception;

class {{ClassName}}Controller extends Controller
{
    /**
     * @var {{ClassName}}Model
     */
    protected ${{ClassNameCamelCase}}Model;

    /**
     * {{ClassName}}Controller constructor.
     * @param ${{ClassNameCamelCase}}Model ${{ClassNameCamelCase}}Model
     */
    public function __construct({{ClassName}}Model ${{ClassNameCamelCase}}Model)
    {
        $this->{{ClassNameCamelCase}}Model = ${{ClassNameCamelCase}}Model;
    }

    /**
     * @param string $project
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws ApiException
     */
    public function search(string $project, Request $request)
    {
        try {
            $params  = $request->toArray();
            $user = $request->user;
            ${{ClassNameCamelCase}} = $this->{{ClassNameCamelCase}}Model->search($project, $params, $user['id']);
            // generate cache
            $response = ['code' => 200, 'data' => ${{ClassNameCamelCase}}];
            return response()->json($response, 200);
        } catch (Exception $e) {
            Log::channel('{{ClassName}}')->debug($e);
            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $project
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function getById(string $project, $id, Request $request)
    {
        try {
            $user = $request->user;
            ${{ClassNameCamelCase}} = $this->{{ClassNameCamelCase}}Model->getById($project, $id, $user['id']);
            $response = ['code' => 200, 'data' => ${{ClassNameCamelCase}}];
            return response()->json($response, 200);
        } catch (Exception $e) {
            Log::channel('{{ClassName}}')->debug($e);
            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $project
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function create(string $project, Request $request)
    {
        try {
            $user = $request->user;
            $response = $this->{{ClassNameCamelCase}}Model->create($project, $request->all());
            $response = ['code' => 200, 'data' => $response];
            return response()->json($response, 200);
        } catch (Exception $e) {
            Log::channel('{{ClassName}}')->debug($e);
            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $project
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function update(string $project, int $id, Request $request)
    {
        try {
            $params  = $request->toArray();
            $user = $request->user;
            ${{ClassNameCamelCase}} = $this->{{ClassNameCamelCase}}Model->update($project, $id, $params, $user['id']);
            // generate cache
            $response = ['code' => 200, 'data' => ${{ClassNameCamelCase}}];
            return response()->json($response, 200);
        } catch (Exception $e) {
            Log::channel('{{ClassName}}')->debug($e);
            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }
    
     /**
      * @param string $project
      * @param int $id
      * @param Request $request
      * @return \Illuminate\Http\JsonResponse
      * @throws Exception
      */
    public function delete(string $project, int $id, Request $request)
    {
        try {
            $params  = $request->toArray();
            $user = $request->user;
            ${{ClassNameCamelCase}} = $this->{{ClassNameCamelCase}}Model->delete($project, $id, $params, $user['id']);
            // generate cache
            $response = ['code' => 200, 'data' => ${{ClassNameCamelCase}}];
            return response()->json($response, 200);
        } catch (Exception $e) {
            Log::channel('{{ClassName}}')->debug($e);
            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
