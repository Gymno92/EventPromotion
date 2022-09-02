<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyEventRequest;
use App\Services\EventPromotionService;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;

/**
 * Class EventController
 * @package App\Http\Controllers
 */
class EventController extends Controller
{
    /**
     * @EventPromotionService
     */
    private EventPromotionService $eventPromotionService;

    /**
     * EventController constructor.
     * @param EventPromotionService $eventPromotionService
     */
    public function __construct(EventPromotionService $eventPromotionService)
    {
        $this->eventPromotionService = $eventPromotionService;
    }

    /**
     * @return View
     */
    public function allEvent() {
        return view('event.eventcontainer', ['events' => $this->eventPromotionService->getAllEvent()]);
    }

    /**
     * @return View
     */
    public function myTickets() {
        return view('event.eventcontainer', ['events' => $this->eventPromotionService->myTickets()]);
    }

    /**
     * @param BuyEventRequest $request
     * @return Redirector
     */
    public function buyEvent(BuyEventRequest $request) {
        $this->eventPromotionService->buyEvent($request);
        return redirect('/myTickets')->with('message', 'Success order!');
    }
}
