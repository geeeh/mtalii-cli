<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'auth', [
                'only'=>[
                    'index',
                    'create',
                    'delete',
                ]
            ]
        );
    }


    /**
     * Fetch all companies belonging to the current user.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $companies = Company::where('user', $userId)
            ->orderBy('name', 'asc')
            ->get();
        return view('dashboard.company', ['companies'=> $companies]);
    }

    /**
     * Add new company entry.
     *
     * @param Request $request - request object
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $id = Auth::user()->id;

        $company = new Company();
        $company->name = $request->input("name");
        $company->location = $request->input("location");
        $company->phone = $request->input("phone");
        $company->email = $request->input("email");
        $company->description = $request->input("description");
        $company->user = $id;
        $file = $request->file("proof");
        $filename = uniqid(8).'.'.$file->getClientOriginalExtension();
        $folderName = "uploads/";
        $destinationPath = $this->publicPath($folderName);
        $file->move($destinationPath, $filename);
        $company->proof = $folderName.$filename;
        $company->save();

        return redirect('companies');
    }


    /**
     * Delete a company by id.
     *
     * @param integer - $id - event id
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws NotFoundException
     * @throws ConflictHttpException
     */
    public function delete($id)
    {
        $company = Company::find($id);
        if (!$company) {
            throw new NotFoundException('company not found');
        }
        $company->delete();
        return redirect('companies');
    }

}
