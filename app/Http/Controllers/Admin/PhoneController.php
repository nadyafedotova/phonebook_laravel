<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PhonebookRequest;
use App\Models\Phone;
use App\Http\Controllers\Controller;


class PhoneController extends Controller
{
    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sortedPhone = Phone::get();
        $countNumber = Phone::count();

        return view('admin.phones.index', [
            'phones' => $sortedPhone,
            'amount_numbers' => $countNumber,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.phones.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PhonebookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PhonebookRequest $request)
    {
        Phone::create($request->all());

        return redirect()->route('admin.phone.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Phone $phone
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Phone $phone)
    {
        return view('admin.phones.edit', [
            'phone' => $phone,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PhonebookRequest $request
     * @param Phone $phone
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PhonebookRequest $request, Phone $phone)
    {
        $phone->update($request->input());                     // Validation successful -> update number

        return redirect()->route('admin.phone.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Phone $phone
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Phone $phone)
    {
        $phone->delete();

        return redirect()->route('admin.phone.index');
    }
}
