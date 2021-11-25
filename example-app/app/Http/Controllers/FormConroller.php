<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormConroller extends Controller
{
    public function getForm(Request $req)
    {
        $req->validate(
            ['fname'=>'required | max:10',
            'lname'=>'required | min:8'
            ]
        );
        return $req->input();
    }
}
