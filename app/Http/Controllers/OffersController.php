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
            $offer->ImageUrl = $request->url;
        }

        $offer->save();
        OneSignalController::sendMessageToUsers($offer->title, $offer->description, array('notificationType' => 'offer'));
        return redirect('/offerhistory/');
    }

    public function offerHistory()
    {
        $offers = Offer::all();
        return view('admin.viewOffers', ['offers' => $offers]);
    }
    
    public function getOffers(){
       return Offer::all();
    }
}
