<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Requests\CardRequest;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    use ApiResponse;

    public function index()
    {
        // $cards = Card::where("client_id", auth()->user()->id)->get();
        $cards = Card::all();
        return $this->success(200, "all cards", $cards);
    }

    public function show(Card $card)
    {
        return $this->success(200, "card Found!", $card);
    }

    public function store(CardRequest $request)
    {
        $request["client_id"] = Auth::user()->id;
        $new_card = Card::create($request->toArray());
        return $this->success(200, "card added successfully!", $new_card);
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return $this->success(200, "card deleted successfully!", $card);
    }
}
