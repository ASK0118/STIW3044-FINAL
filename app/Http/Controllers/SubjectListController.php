<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tutor;
use Illuminate\Support\Facades\Auth;


class SubjectListController extends Controller
{
    public function saveProduct(Request $request)
    {
        echo json_encode($request->all());
        $newProductItem = new tutor();
        $newProductItem->subject_title = $request->sjname;
        $newProductItem->subject_description = $request->sjdesc;
        $newProductItem->subject_price = $request->sjprice;
        $newProductItem->subject_totalhour = $request->sjtotalhour;
        $newProductItem->save();
        return redirect('mainpage')->with('save', 'Success')->withErrors('error', 'Failed');
    }

    public function mainpage()
    {
        if (Auth::check()) {
            return view('mainpage', ['listProducts' => Product::all()]);
        }
        return redirect("login")->withSuccess('You do not have access');
    }
    public function markDelete($id)
    {
        $listItem = Product::find($id);
        $listItem->delete();
        return redirect('mainpage');
    }

    public function markUpdate($id, Request $request)
    {
        $listItem = Product::find($id);
        $listItem->subject_title = $request->sjname;
        $listItem->subject_description = $request->sjdesc;
        $listItem->subject_price = $request->sjprice;
        $listItem->subject_totalhour = $request->sjtotalhour;
        $listItem->update();
        return redirect('mainpage');
    }
}