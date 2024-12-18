<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class SneakersController extends Controller
{
 
    
    public function index()
    {
        if (Auth::check()) {
            // Appelle l'API avec pagination
            $response = Http::get(env('SNEAKERS_API_URL'), [
                'pagination[pageSize]' => 50,
                'pagination[page]' => request('page', 1)
            ]);

            if ($response->successful()) {
                $data = $response->json();

                return view('sneakers.index', [
                    'sneakers' => $data['data'],
                    'pagination' => $data['meta']['pagination']
                ]);
            }

            return back()->with('error', 'Impossible de récupérer les données des sneakers.');
        }

        // Rediriger vers login si non authentifié
        return redirect()->route('login');
    }
}
