<?php

namespace App\Services;

use App\Filters\Events\EventHasNotUserFilter;
use App\Filters\Events\EventUserFilter;
use App\Http\Requests\BuyEventRequest;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Auth;

/**
 * Class EventPromotionService
 * @package App\Services
 */
class EventPromotionService
{

    /**
     * @return Collection
     */
    public function getAllEvent(): Collection
    {
        return Event::all();
    }

    /**
     * @return Collection
     */
    public function getAllAvailableEventForUser(): Collection
    {
        return app(Pipeline::class)
            ->send(Event::query())
            ->through([EventHasNotUserFilter::class])
            ->thenReturn()->get();
    }


    /**
     * @param BuyEventRequest $request
     */
    public function buyEvent(BuyEventRequest $request): void {
        Auth::user()->events()->attach(Event::find($request->get("event_id")));
    }

    /**
     * @return Collection
     */
    public function myTickets(): Collection
    {
        return app(Pipeline::class)
            ->send(Event::query())
            ->through([EventUserFilter::class])
            ->thenReturn()->get();
    }
}
