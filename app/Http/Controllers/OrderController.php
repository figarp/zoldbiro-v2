<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::with('service');

        // Keresés
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('customer_first_name', 'like', "%$search%")
                ->orWhere('customer_last_name', 'like', "%$search%")
                ->orWhere('customer_email', 'like', "%$search%")
                ->orWhereHas('service', function ($serviceQuery) use ($search) {
                    $serviceQuery->where('name', 'like', "%$search%");
                });
            });
        }

        // Rendezés: legújabb "pending" felül
        $orders = $query->orderByRaw("
            FIELD(status, 'pending', 'completed', 'rejected'),
            created_at DESC
        ")->paginate(10);

        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('orders.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'customer_last_name' => 'required|string|max:255',
            'customer_first_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email|max:255',
            'comment' => 'nullable|string|max:500',
        ]);

        $order = Order::create($request->all());
        return view('orders.confirmation', compact('order'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:completed,rejected']);
        $order->update(['status' => $request->status]);
        return redirect()->route('dashboard.orders')->with('success', 'Rendelés státusza frissítve.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
