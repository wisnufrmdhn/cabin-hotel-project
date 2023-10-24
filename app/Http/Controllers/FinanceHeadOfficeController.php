<?php

namespace App\Http\Controllers;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class FinanceHeadOfficeController extends Controller
{
    private $service;

    public function __construct(ReservationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.financeHO.index');
    }}
