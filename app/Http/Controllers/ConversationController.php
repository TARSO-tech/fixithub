<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConversationController extends Controller
{
    public function index(): View
    {
        $conversations = auth()->user()->conversations()
            ->with(['participants', 'messages.sender'])
            ->latest()
            ->get();

        return view('conversations.index', [
            'conversations' => $conversations,
            'contacts' => User::query()->where('id', '!=', auth()->id())->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'recipient_id' => ['required', 'exists:users,id'],
            'body' => ['required', 'string', 'max:1000'],
        ]);

        $userId = auth()->id();
        $recipientId = (int) $validated['recipient_id'];

        $conversation = auth()->user()->conversations()
            ->whereHas('participants', fn ($query) => $query->where('users.id', $recipientId))
            ->first();

        if (! $conversation) {
            $conversation = Conversation::create(['title' => 'Private conversation']);
            $conversation->participants()->syncWithoutDetaching([$userId, $recipientId]);
        }

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $userId,
            'recipient_id' => $recipientId,
            'body' => $validated['body'],
        ]);

        $conversation->messages()->save($message);

        return redirect()->route('conversations.index')->with('success', 'Message sent.');
    }
}
