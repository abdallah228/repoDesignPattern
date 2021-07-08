<?php
namespace App\Repository;
use App\Interfaces\CrudInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Company as model;
use Throwable;

class CompanyRepository implements CrudInterface
{
   protected $model = Model::class;
   const ROOTPATH = 'images/';


   /**
    * return all data
    * @var model
    */
    public function list(): collection
    {
        $model = $this->model;
        return $model::all();
    }
    /**
     *return single option
     * @var model
     * @var id
     */
    public function listOption($id)//single
    {
        $model=$this->model;
        return $model::find($id);
    }

    public function create(array $data)
    {
        $model = $this->model;
        if(request()->image->isValid()) {
            $imagePath = now()->format('d-m-y-h-s-m') . request()->image->getClientOriginalName();
            //storeAs(path,name)
            $imagePath = request()->logo->storeAs(self::ROOTPATH . $model::count() + 1, $imagePath);
            $data['image'] = $imagePath;
            $create = $model::create($data);
        }
        $create = $model::create($data);
        return $create;

    }

    public function update(array $data,$id)
    {
        $model = $this->model;
        $model::find($id);
        if(request()->image->isValid()) {
            $imagePath = now()->format('d-m-y-h-s-m') . request()->image->getClientOriginalName();
            //storeAs(path,name)
            $imagePath = request()->logo->storeAs(self::ROOTPATH . $model::count() + 1, $imagePath);
            $data['image'] = $imagePath;
            $update = $model::create($data);
        }
        $update = $model::update($data);
        return $update;
    }

    public function delete($id):mixed
    {
        $model = $this->model;
        $delete = $model::find($id);
        $delete->delete() ? true : false;

    }
}
