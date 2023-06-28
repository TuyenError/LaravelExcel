<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function exportUser(){
       return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function importUser(Request $request){
        Excel::import(new UsersImport, $request->file('file'));
        return redirect()->back();
    }
    public function Index()
{
    $users = User::all();
    return view('excel', compact('users'));
        
}


}
