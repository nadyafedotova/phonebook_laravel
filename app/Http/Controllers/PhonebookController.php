<?php

namespace App\Http\Controllers;

use App\Models\Phone;

/**
 * Class PhonebookController - only read contacts and search.
 * @package App\Http\Controllers
 */
class PhonebookController extends Controller
{    /**
 * Create a new controller instance.
 *
 * @return void
 */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sortedPhones = Phone::sorted();

        $countNumber = Phone::countPhone();

        return view('phonebook', [
            'phones' => $sortedPhones,
            'amount_numbers' => $countNumber,
        ]);
    }
}
