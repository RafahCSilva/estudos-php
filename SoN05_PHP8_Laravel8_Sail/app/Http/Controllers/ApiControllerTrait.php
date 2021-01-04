<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/** @property-read  \Illuminate\Database\Eloquent\Model $model */
trait ApiControllerTrait
{

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $limit = $request->get('limit', 20);

        $order = $request->get('order', null);
        if ($order !== null) {
            $order = explode(',', $order);
        }
        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'asc';

        $where = $request->get('where', []);

        $like = $request->get('like', null);
        if ($like !== null) {
            $like = explode(',', $like);
            $like[1] = '%'.$like[1].'%';
        }

        $result = $this
            ->model
            ->orderBy($order[0], $order[1])
            ->where(function ($query) use ($like) {
                if ($like) {
                    return $query->where($like[0], 'like', $like[1]);
                }
                return $query;
            })
            ->where($where)
            ->with($this->relationships())
            ->paginate($limit);

        return response()->json($result); // , 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $result = $this->model->create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $result = $this->model->with($this->relationships())
            ->findOrFail($id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $result = $this->model->findOrFail($id);
        $result->update($request->all());
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $result = $this->model->findOrFail($id);
        $result->delete();
        return response()->json($result);
    }

    protected function relationships(): array
    {
        return $this->relationships ?? [];
    }
}
