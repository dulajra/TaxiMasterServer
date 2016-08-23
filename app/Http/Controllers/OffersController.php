<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;

use App\Http\Requests;

class OffersController extends Controller
{
    public function newOfferView()
    {
        return view('admin.newOffer');
    }

    public function newOfferSave(Request $request)
    {
        $offer = new Offer();
        $offer->title = $request->title;
        $offer->description = $request->description;
        if (!empty($request->url)) {
            $offer->url = $request->url;
        }

        $offer->save();
        OneSignalController::sendMessageToAll($offer->title, $offer->description);
        return redirect('/offerhistory/');
    }

    public function offerHistory()
    {
        $offers = Offer::all();
        return view('admin.viewOffers', ['offers' => $offers]);
    }
}
