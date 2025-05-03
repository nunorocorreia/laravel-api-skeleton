<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\TicketFilter;
use App\Http\Requests\Api\V1\StoreTicketRequest;
use App\Http\Requests\Api\V1\UpdateTicketRequest;
use App\Http\Resources\V1\TicketResource;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class TicketController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(TicketFilter $filters)
    {
        return TicketResource::collection(Ticket::filter($filters)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request): JsonResponse|TicketResource
    {
        try {
            $user = User::findOrFail($request->input('data.relationships.author.data.id'));
        } catch (ModelNotFoundException $e) {
            return $this->error('User not found', 404);
        }

        $ticket = [
            'title' => $request->input('data.attributes.title'),
            'description' => $request->input('data.attributes.description'),
            'status' => $request->input('data.attributes.status'),
            'user_id' => $user->id,
        ];

        return new TicketResource(Ticket::create($ticket));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        if ($this->include('author')) {
            return new TicketResource($ticket->load('user'));
        }
        return new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return response()->json($ticket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return response()->json(null, 204);
    }
}
