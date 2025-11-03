<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AutoReply;
use Illuminate\Http\Request;

class AutoReplyController extends Controller
{
    // GET /auto-replies
public function index()
{
    try {
        return response()->json(AutoReply::all());
    } catch (\Throwable $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve auto-replies.',
            'error' => $e->getMessage()
        ], 500);
    }
}

// POST /auto-replies
public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'trigger' => 'required|string|max:255',
            'response' => 'required|string|max:1000',
        ]);

        $reply = AutoReply::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Auto-reply created successfully.',
            'data' => $reply,
        ], 201);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $e->errors()
        ], 422);
    } catch (\Throwable $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to create auto-reply.',
            'error' => $e->getMessage()
        ], 500);
    }
}

// PUT /auto-replies/{id}
public function update(Request $request, $id)
{
    try {
        $reply = AutoReply::findOrFail($id);

        $reply->update($request->only(['trigger', 'response']));

        return response()->json([
            'success' => true,
            'message' => 'Auto-reply updated successfully.',
        ]);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Auto-reply not found.',
            'error' => $e->getMessage()
        ], 404);
    } catch (\Throwable $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to update auto-reply.',
            'error' => $e->getMessage()
        ], 500);
    }
}

// POST /chat/auto-reply
public function getReply(Request $request)
{
    try {
        $message = strtolower(trim($request->input('message')));

        // Exact match
        $reply = AutoReply::whereRaw('LOWER(trigger) = ?', [$message])->first();

        if ($reply) {
            return response()->json([
                'success' => true,
                'reply'=> $reply->response
            ]);
        }

        // Optional partial match (contains word)
        $reply = AutoReply::whereRaw('LOWER(trigger) LIKE ?', ["%{$message}%"])->first();

        if ($reply) {
            return response()->json([
                'success' => true,
                'reply' => $reply->response
            ]);
        }

        // Default fallback
        return response()->json([
            'success' => false,
            'reply' => "I'm sorry, I didn't understand that. Please contact a vet for assistance.",
        ], 200);

    } catch (\Throwable $e) {
        return response()->json([
            'success' => false,
            'reply' => "An unexpected error occurred while processing your request.",
            'error' => $e->getMessage()
        ], 500);
    }
}
}
