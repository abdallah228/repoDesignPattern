<?php
namespace App\interfaces;

interface CrudInterface
{
    /**
     *
     */
    public function list(): mixed;

    public function create( array $data): mixed;

    public function update( array $data,$id): mixed;

    public function delete($id):mixed;
}
