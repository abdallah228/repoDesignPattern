<?php

namespace App\Http\Controllers;

use App\Repository\CompanyRepository;
use Illuminate\Http\Request;
use App\Models\Company as model;

class CompaniesController extends Controller
{
    //
    public function index(Request $request, CompanyRepository $companyRepository)
    {
        $companies = $companyRepository->list();
        return $companies;
    }

    public function store(CompanyRepository $companyRepository)
    {
        $store = $companyRepository->create(request()->all());
        return $store;
    }
    public function show(CompanyRepository $companyRepository,$id)
    {
        $record = $companyRepository->listOption($id);
        return $record;
    }
    public function update(CompanyRepository $companyRepository, $id)
    {
        $update = $companyRepository->update($id,request()->all());//bug
        return $update;
    }
    public function delete(CompanyRepository $companyRepository,$id)
    {
        $delete = $companyRepository->delete($id);
    }
}
