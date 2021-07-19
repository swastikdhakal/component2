<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CdProduct;
use App\Http\Controllers\BookProduct;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = public_path('products.json');
        $jdcode = json_decode(file_get_contents($data), true);
        //dd($jdcode);
        //eager loading
        return view('index')->with('products',$jdcode);


    }
   /*   public function cd(){
        $value = public_path('products.json');
        $jsondcode = json_decode(file_get_contents($value), true);
        //dd($jdcode);
        //eager loading
        return view('cd')->with('products',$jsondcode);

    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /*  $file = public_path('products.json'); */


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        //
        //print_r($request->input());
        /* $title= $request->input('title');
        $firstname= $request->input('fname');
        $mainname= $request->input('sname');
        $price= $request->input('price');
        $page= $request->input('page');
        print_r($firstname,$mainname); */
       // $paths =public_path('products.json');



  //  } */
    public function store(){
        /* $datas= $req->input();
        dd($datas); */
        //print_r($req->input());
        $file = '../public/products.json';
        $productsJson = json_decode(file_get_contents($file), true);


        $ids = [];

        foreach($productsJson as $product){
            $ids[]=$product['id'];

        }
        rsort($ids);// sorts the array in php in decending order.
        $newid = $ids[0]+1;
        $products=[];

        foreach($productsJson as $product){
            $products[] =$product;
        }

        $newProducts =[];

        /* $type= $req->input('type');
        $title= $req->input('title');
        $firstname= $req->input('fname');
        $mainname= $req->input('sname');
        $price= $req->input('price');
        $page= $req->input('page');
        //print_r($title);

        $newProducts['id'] =$newid;
        $newProducts['type'] = $type;
        $newProducts['title'] = $title;
        $newProducts['firstname'] = $firstname;
        $newProducts['mainname'] = $mainname;
        $newProducts['price'] = $price;

        if($type=='cd') $newProducts['playlenght']=$page;
        if($type=='book') $newProducts['numpages']=$page; */
        $newProducts['id']= $newid;
        $newProducts['type']=request('type');
        $producttype=request('type');
        $newProducts['title']=request('title');
        $newProducts['firstname']=request('fname');
        $newProducts['mainname']=request('sname');
        $newProducts['price']=request('price');

        if($producttype=='cd') $newProducts['playlength']=request('page');
        if($producttype=='book') $newProducts['numpages']=request('page');


        $products[] = $newProducts;

        $json = json_encode($products);
        /* dd($json); */
        if(file_put_contents($file,$json))
            return redirect('/');
        else
            return 'data inserded failed';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $file = '../public/products.json';
        $string = file_get_contents($file);

        $productsJson = json_decode($string, true);
        $product=$this->getProductId($id,$productsJson);
        //dd($product);
        //returning to update form in view
       return view('update')->with('product',$product);

    }
    public function getProductId($id,$productsJson){
        //$string = file_get_contents($this->getFile());

        //$productsJson = json_decode($string, true);

        $product = [];//custom arrary product defiend.

        foreach ($productsJson as  $product) {
            if ($product['id'] == $id)  return  $product;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $file = '../public/products.json';
        //$string = file_get_contents($file);
        $products= [];
        $productsJson = json_decode(file_get_contents($file), true);
        //$products=$this->getProductId($id,$productsJson);
        foreach ($productsJson as $product) {

            if($product['id']==$id) {
                $product['title'] = request('title');
                $product['firstname'] = request('fname');
                $product['mainname'] = request('sname');
                $product['price'] = request('price');
                if($product['type']=='cd') $product['playlength'] = request('page');
                if($product['type']=='book') $product['numpages'] =request('page');
            }
            $products[] = $product;
        }

        $json = json_encode($products);
        if(file_put_contents($file, $json))
            return redirect('/');
        else
            return false;

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
        $file ='../public/products.json';
        $productsJson = json_decode(file_get_contents($file), true);

        $products = [];
        foreach ($productsJson as $product) {
            if($product['id'] != $id) {
                $products[] = $product;
            }
        }
        $json = json_encode($products);
        if(file_put_contents($file, $json))
            return redirect('/');
        else
            return 'not deleted';
    }
}
