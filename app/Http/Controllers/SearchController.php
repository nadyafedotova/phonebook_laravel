<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search for a contact by partially entered number and/or contact name.
     * @param Request $request
     */
    public function search(Request $request)
    {
        $post = $request->all();
        $contactLastName = $post['contactLastName'];
        $contactPhone = $post['contactPhone'];

        $phones = Phone::where('phone', 'LIKE', '%'.$contactPhone.'%')
            ->where('last_name', 'LIKE', '%'.$contactLastName.'%')
            ->get();

        $amount_numbers=sizeof($phones);

        echo json_encode(array(
                'phones' => $phones,
                'amount_numbers' => $amount_numbers
            )
        );
    }
}
