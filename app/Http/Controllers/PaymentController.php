<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function index()
    {
        $data = array(
            "orgClientId" => "600002165",
            "orgOkUrl" => url('validate'),
            "orgFailUrl" => url('validate'),
            // "orgOkUrl" => url("/").'/Ok-Fail.php',
            // "orgFailUrl" => url("/").'/Ok-Fail.php',
            "orgTransactionType" => "PreAuth",
            "orgRnd" => microtime(),
            "shopurl" => url("/"),
            "orgCallbackUrl" => url("/") . '/callback.php',
            "orgCurrency" => '504',
            "AutoRedirect" => "true",
            "FirstName" => '',
            "LastName" => '',
            "email" => '',
            "tel" => '',
            "BillToCountry" => 'Maroc' ,
            "BillToCity" => 'Rabat',
            "BillToPostalCode" => '11500',
            "BillToStreet1" => '',
            "amount" => '',

            "oid" => time() . "Complexe",
          );
        return view('testP' , compact('data'));
    }

    function cmi()
    {
        request()->validate([
            "BillToName" => "required",
            "email" => "required|email",
            "tel" => "required",
            // "BillToCountry" => "required",
            // "BillToCity" => "required",
            // "BillToPostalCode" => 'required',
            "BillToStreet1" => "required",
            "amount" => "required"
          ]);
          dd(request());
        return view('confirm-cmi');
    }
}
