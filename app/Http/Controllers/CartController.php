<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Cart::content(); 
       return view('product.cart')->with('products', $products);
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
        
        $duplicata = Cart::search(function ($cartItem, $rowId)  use($request){
            return $cartItem->id === $request->id;
        });

        if($duplicata->isNotEmpty()){
            return redirect()->route('home')->with('success','Le produit a déja été ajouter au panier.');
        }

        $product = Product::findOrFail($request->id);

        Cart::add($product->id, $product->name,1, $product->amount*100)
            ->associate('App\Models\Product');
        return redirect()->route('home')->with('success','Le produit a bien été ajouter au panier.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $rowId)
    {
        
       

        $data = $request->json()->all();
        $validator = Validator::make($request->all(),[
            'qty' => 'required|numeric|between:1,6'
        ]);
        
        if($validator->fails()){
            Session::flash('danger', 'La quantité du produit est ne doit pas depassée 6.');
            return response()->json(['error'=> "La quantité du produit n'est modifié ."]);
        }
        Cart::update($rowId, $data['qty']);
        Session::flash('success', 'La quantité du produit est passé à ' . $data['qty'].'.');
        return response()->json(['success'=> 'La quantité est modifié avec success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        
        Cart::remove($rowId);
        return back()->with('success','Le produit a été supprimé.');
    }
}
