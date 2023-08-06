<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'column_id' => 'required|exists:columns,id',
        ]);

        $card = Card::create($validated);

        return response()->json($card, 201);
    }

    public function update(Request $request, Card $card): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'column_id' => 'exists:columns,id',
        ]);

        $card->fill($validated);

        $card->save();

        return response()->json($card);
    }

    public function destroy(Card $card): Response
    {
        $card->delete();

        return response()->noContent();
    }
}
