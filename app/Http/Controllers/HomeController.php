<?php

namespace App\Http\Controllers;

use App\Services\EventPromotionService;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * @var EventPromotionService
     */
    private EventPromotionService $eventPromotionService;


    /**
     * HomeController constructor.
     * @param EventPromotionService $eventPromotionService
     */
    public function __construct(EventPromotionService $eventPromotionService)
    {
        $this->eventPromotionService = $eventPromotionService;
    }

    public function index()
    {
        return view('home', ['events' => $this->eventPromotionService->getAllAvailableEventForUser()]);
    }
}
