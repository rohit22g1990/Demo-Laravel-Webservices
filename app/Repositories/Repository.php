<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Repository
 * @package App\Repositories
 */
class Repository
{
    /**
     * Object of particular model
     *
     * @var object
     */
    protected $model;

    /**
     * Get all records for particular model.
     *
     * @return collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Find record by its primary key
     *
     * @param string $id
     * @return collection
     */
    public function findOrFail(string $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Find record by its primary key
     *
     * @param string $id
     * @return collection
     */
    public function find(string $id)
    {
        return $this->model->find($id);
    }

    /**
     * Get model list with search records
     *
     * @param $searchKey
     * @return mixed
     */
    public function getListWithSearch($searchKey)
    {
        $entity = $this->model->orderBy($this->model->defaultSortColumn, 'ASC');

        return !empty($searchKey)
            ? $this->getSearchedRecords($searchKey, $entity, $this->model->searchableColumns)
            : $entity->get();
    }

    /**
     * Create new record
     *
     * @param array $attributes
     * @return collection
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Create new record
     *
     * @param array $attributes
     * @return collection
     */
    public function insert(array $attributes)
    {
        return $this->model->insert($attributes);
    }

    /**
     * To update existing record
     *
     * @param string $id
     * @param array $attributes
     * @return boolean
     */
    public function update(string $id, array $attributes)
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    /**
     * To delete a record
     *
     * @param string $id
     * @return boolean
     */
    public function delete(string $id)
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * To update record by matching multiple attributes
     *
     * @param array $where
     * @param array $attributes
     * @return boolean
     */
    public function updateBy(array $where, array $attributes)
    {
        return $this->model->where($where)->update($attributes);
    }

    /**
     * To delete record by matching multiple attributes
     *
     * @param array $attributes
     * @return boolean
     */
    public function deleteBy(array $attributes)
    {
        return $this->model->where($attributes)->delete();
    }

    /**
     * To get all records by particular conditions
     *
     * @param array $attributes
     * @return collection
     */
    public function whereBy(array $attributes)
    {
        return $this->model->where($attributes)->get();
    }

    public function sortBy($column, $sort = 'ASC')
    {
        return $this->model->orderBy($column, $sort);
    }

    /**
     * Search records
     *
     * @param $searchKey
     * @param $entity
     * @param $allowed
     * @return mixed
     */
    public function getSearchedRecords($searchKey, $entity, $allowed)
    {
        $entity = $entity->where(function ($q) use ($allowed, $searchKey) {
            foreach ($allowed as $item) {
                $q->where($item,'like', '%'.$searchKey.'%');
            }
        });

        return $entity->get();
    }
}
