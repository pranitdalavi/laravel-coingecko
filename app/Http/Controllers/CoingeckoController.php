<?php

namespace App\Http\Controllers;

use App\Models\Coingecko;
use Illuminate\Http\Request;

class CoingeckoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        try {
            //Curl code for coingecko api call and fetch the data
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.coingecko.com/api/v3/coins/list?include_platform=true',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: __cf_bm=nofZorjfxr08Z4rDL4zVRZKDR7h62LufiWownQpXsMI-1686899980-0-AXTHiE4SFJldmMQQbXiaq6rykoPbSrzbxY+ab03c8Ug7nnoq7jn68iF3r5+zwYwGqXdHYov7vAxMUByUx9jOacU='
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $coingeckoResponse = json_decode($response);

            $id = $request->id ?? null;
            $coingecko = new Coingecko();

            foreach ($coingeckoResponse as $coingeckoResponseKey => $coingeckoResponseValue) {
                $coingecko = $coingecko->updateOrCreate(
                    [
                        'id'   => $id,
                    ],
                    [
                        'coingeckoid'     => $coingeckoResponseValue->id,
                        'symbol'     => $coingeckoResponseValue->symbol,
                        'name'     => $coingeckoResponseValue->name,
                        'platforms'     => json_encode($coingeckoResponseValue->platforms),
                    ]
                );
            }
            return response()->json(['success' => "Data saved successfully", 'status' => 200]);
        } catch (\Exception $e) {
            \Log::error($e);
            return $e->getMessage();
        }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
