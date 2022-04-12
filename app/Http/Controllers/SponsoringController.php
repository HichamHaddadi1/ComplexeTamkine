<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SponsoringController extends Controller
{
    function sponsorForm()
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
            "amountCur" => '',
            "symbolCur" => '',
            "oid" => time() . "Complexe",
          );
        return view('sponsoring.sponsor-form' , compact('data'));
    }
    function index()
    {
        return view('sponsoring.index');
    }

    function sponsor()
    {
        return view('sponsoring.become-sponsor');
    }
    function ambassador()
    {
        return view('sponsoring.become-ambassador');
    }
}
