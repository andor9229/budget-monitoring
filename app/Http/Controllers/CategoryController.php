<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Account\Account;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('pages.category.index')
            ->with('categories', Category::where('account_id', auth()->user()->select_account_id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.category.create')
            ->with('categories', Category::where('account_id', auth()->user()->select_account_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryRequest  $request
     * @return View
     */
    public function store(CategoryRequest $request)
    {
            Category::create([
                'name' => Str::lower($request->name),
                'amount' => $request->amount,
                'account_id' => auth()->user()->select_account_id
            ]);

            Session::flash('status', 'Categoria creata correttamente!');
            return view('pages.category.index')
                ->with('categories', Category::where('account_id', auth()->user()->select_account_id));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
