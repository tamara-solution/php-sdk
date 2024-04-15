<?php

namespace Modules\Tamara\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TamaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('tamara::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tamara::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id): View
    {
        return view('tamara::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        return view('tamara::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
