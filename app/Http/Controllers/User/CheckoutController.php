<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Checkout\Store;
use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Camp $camp, Request $request)
    {
        if ($camp->isRegistered) {
            session()->flash('error', "Anda sudah terdaftar di {$camp->title}");
            return redirect(route('user.dashboard'));
        }
        return view('checkout.index', compact('camp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request, Camp $camp)
    {
        return $request->all();
        $data = $request->all();
        $data['camp_id'] = $camp->id;
        $data['user_id'] = Auth::user()->id;

        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->save();

        Checkout::create($data);
        return redirect(route('checkout.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }

    public function success()
    {
        return view('checkout.succes_checkout');
    }
}
