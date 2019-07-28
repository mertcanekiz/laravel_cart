<?php

namespace App\Http\Controllers;

use App\Product;
use App\PriceOption;
use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];

        foreach ($request->input('valid_from.*.name') as $key => $value) {
            $rules["valid_from.{$key}"] = 'required';
        }

        foreach ($request->input('valid_to.*.name') as $key => $value) {
            $rules["valid_to.{$key}"] = 'required';
        }

        foreach ($request->input('currency.*.name') as $key => $value) {
            $rules["currency.{$key}"] = 'required';
        }

        foreach ($request->input('original_price.*.name') as $key => $value) {
            $rules["original_price.{$key}"] = 'required';
        }

        foreach ($request->input('discounted_price.*.name') as $key => $value) {
            $rules["discounted_price.{$key}"] = 'required';
        }

        foreach ($request->input('discount_rate.*.name') as $key => $value) {
            $rules["discount_rate.{$key}"] = 'required';
        }

        foreach ($request->input('price_options.*.name') as $key => $value) {
            $rules["price_options.{$key}"] = 'required';
        }

        foreach ($request->input('option_type.*.name') as $key => $value) {
            $rules["option_type.{$key}"] = 'required';
        }

        foreach ($request->input('option_value.*.name') as $key => $value) {
            $rules["option_value.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $options = [];
            $prices = [];
            foreach ($request->input('option_type.*.name') as $key => $value) {
                $option = new PriceOption([
                    'type' => $request->input("option_type.{$key}"),
                    'value' => $request->input("option_value.{$key}")
                ]);
                $options[$key] = $option;
            }
            $product = new Product([
                'title' => $request->title,
                'description' => $request->description,
                'image_url' => $request->image_url
            ]);
            $product->save();
            foreach ($request->input('valid_from.*.name') as $key => $value) {
                $price = new Price([
                    'valid_from' => $request->input("valid_from.{$key}"),
                    'valid_to' => $request->input("valid_to.{$key}"),
                    'currency' => $request->input("currency.{$key}"),
                    'original_price' => $request->input("original_price.{$key}"),
                    'discounted_price' => $request->input("discounted_price.{$key}"),
                    'discount_rate' => $request->input("discount_rate.{$key}"),
                ]);
                $price = $product->prices()->save($price);
            }
            return redirect(route('products.show', compact('product')));
        } else {
            return JsonResponse::create(['fail' => 'true']);
        }

        
        $product = Product::create($validatedData);
        return redirect(route('products.show', ['product' => $product]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'image_url' => 'required'
        ]);
        $product->title = $validatedData['title'];
        $product->description = $validatedData['description'];
        $product->image_url = $validatedData['image_url'];
        $product->save();
        return redirect(route('products.show', compact('product')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('message', 'Product deleted.');
        return redirect(route('products.index'));
    }
}
