<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Info;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $info = Info::all();
        $productsQuery = Product::orderBy('created_at', 'desc');

        // Handle name search
        if ($request->name) {
            $productsQuery->where(function ($query) use ($request) {
                $query->orWhere('name_ar', 'LIKE', "%{$request->name}%")
                    ->orWhere('name_en', 'LIKE', "%{$request->name}%")
                    ->orWhere('dese_ar', 'LIKE', "%{$request->name}%")
                    ->orWhere('dese_en', 'LIKE', "%{$request->name}%")
                    ->orWhere('nickname_st', 'LIKE', "%{$request->name}%")
                    ->orWhere('nickname_num', 'LIKE', "%{$request->name}%")
                    ->orWhere('nickname_main', 'LIKE', "%{$request->name}%");
            });
        }

        // Handle image search
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'required|image']);
            $imagePath = $request->file('image')->store('images', 'public');
            $imageContent = file_get_contents(storage_path('app/public/' . $imagePath));

            // Computer Vision API
            $visionEndpoint = 'https://alfaraasearchbyimage.cognitiveservices.azure.com/vision/v3.1/analyze';
            $visionSubscriptionKey = '225372099f7f4deaa783a05feaf9ccc9';

            $visionResponse = Http::withHeaders([
                'Ocp-Apim-Subscription-Key' => $visionSubscriptionKey,
                'Content-Type' => 'application/octet-stream',
            ])->withBody($imageContent, 'application/octet-stream')->post($visionEndpoint . '?visualFeatures=Categories,Description,Color');

            $visionData = $visionResponse->json();

            if (isset($visionData['description']['tags'])) {
                $tags = $visionData['description']['tags'];

                // Translator API
                $translatorEndpoint = 'https://api.cognitive.microsofttranslator.com/translate?api-version=3.0&to=ar';
                $translatorSubscriptionKey = '14cf171fdf2341eeba1c40f67b7a606c';

                $translatorResponse = Http::withHeaders([
                    'Ocp-Apim-Subscription-Key' => $translatorSubscriptionKey,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Ocp-Apim-Subscription-Region' => 'qatarcentral',
                ])->withBody(json_encode([['Text' => implode(", ", $tags)]], JSON_UNESCAPED_UNICODE), 'application/json')->post($translatorEndpoint);

                if ($translatorResponse->status() != 200) {
                    Log::error('Translation API request failed', ['response' => $translatorResponse->body()]);
                    return response()->json(['error' => 'Translation API request failed'], 500);
                }

                $translatorData = $translatorResponse->json();
                $translatedTags = array_map(function ($translation) {
                    return $translation['translations'][0]['text'];
                }, $translatorData);

                $translatedTags = explode(', ', implode(', ', $translatedTags));

                // Search products by translated tags (Arabic)
                $productsQuery->where(function ($query) use ($translatedTags) {
                    foreach ($translatedTags as $tag) {
                        if (empty($tag)) {
                            continue;
                        }
                        $query->orWhere('name_ar', 'LIKE', "%{$tag}%")
                            ->orWhere('name_en', 'LIKE', "%{$tag}%")
                            ->orWhere('dese_ar', 'LIKE', "%{$tag}%")
                            ->orWhere('dese_en', 'LIKE', "%{$tag}%")
                            ->orWhere('nickname_st', 'LIKE', "%{$tag}%")
                            ->orWhere('nickname_num', 'LIKE', "%{$tag}%")
                            ->orWhere('nickname_main', 'LIKE', "%{$tag}%");
                    }
                });

                // Search products by tags (English)
                $productsQuery->orWhere(function ($query) use ($tags) {
                    foreach ($tags as $tag) {
                        if (empty($tag)) {
                            continue;
                        }
                        $query->orWhere('name_ar', 'LIKE', "%{$tag}%")
                            ->orWhere('name_en', 'LIKE', "%{$tag}%")
                            ->orWhere('dese_ar', 'LIKE', "%{$tag}%")
                            ->orWhere('dese_en', 'LIKE', "%{$tag}%")
                            ->orWhere('nickname_st', 'LIKE', "%{$tag}%")
                            ->orWhere('nickname_num', 'LIKE', "%{$tag}%")
                            ->orWhere('nickname_main', 'LIKE', "%{$tag}%");
                    }
                });
            } else {
                Log::error('No tags found in vision API response', ['response' => $visionData]);
                return response()->json(['error' => 'Image recognition failed'], 500);
            }
        }

        // Conditionally apply pagination
        if ($request->name || $request->hasFile('image')) {
            $products = $productsQuery->get();
        } else {
            $products = $productsQuery->paginate(20);
        }

        return view('front.product', compact('products', 'info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $info = Info::orderBy('created_at', 'desc')->paginate(1);
        return view('front.product-show', [
            'product' => $product,
            'info' => $info,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
