<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = Products::all()->sortBy('product_must');
        return view('backend.products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_title' => 'required',
            'product_content' => 'required',
            'product_cost' => 'required',

        ]);

        if (strlen($request->product_slug)>3)
        {
            $slug=Str::slug($request->product_slug);
        } else {
            $slug=Str::slug($request->product_title);
        }

        if ($request->hasFile('product_file'))
        {
            $request->validate([
                'product_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->product_file->getClientOriginalExtension();
            $request->product_file->move(public_path('images/products'),$file_name);
        } else {
            $file_name=null;
        }



        $product=Products::insert(
          [
              "product_title" => $request->product_title,
              "product_sale" => $request->product_sale,
              "product_cost" => $request->product_cost,
              "product_category" => $request->product_category,
              "product_slug" => $slug, //işlem
              "product_file" => $file_name,//İşlem
              "product_content" => $request->product_content,
              "product_status" => $request->product_status,
          ]
      );

      if ($product)
      {
          return redirect(route('product.index'))->with('success','İşlem Başarılı');
      }
        return back()->with('error','İşlem Başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=Products::where('id',$id)->first();
        return view('backend.products.edit')->with('products',$products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_title' => 'required',
            'product_content' => 'required',
            'product_cost' => 'required',
        ]);

        if (strlen($request->product_slug)>3)
        {
            $slug=Str::slug($request->product_slug);
        } else {
            $slug=Str::slug($request->product_title);
        }

        if ($request->hasFile('product_file'))
        {
            $request->validate([
                'product_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->product_file->getClientOriginalExtension();
            $request->product_file->move(public_path('images/products'),$file_name);

            $product=Products::Where('id',$id)->update(
                [
                  "product_title" => $request->product_title,
                  "product_sale" => $request->product_sale,
                  "product_cost" => $request->product_cost,
                  "product_category" => $request->product_category,
                  "product_slug" => $slug, //işlem
                  "product_file" => $file_name,//İşlem
                  "product_content" => $request->product_content,
                  "product_status" => $request->product_status,
                ]
            );

            $path='images/products/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }

        } else {
            $product=Products::Where('id',$id)->update(
                [
                  "product_title" => $request->product_title,
                  "product_sale" => $request->product_sale,
                  "product_cost" => $request->product_cost,
                  "product_category" => $request->product_category,
                  "product_slug" => $slug, //işlem
                  "product_content" => $request->product_content,
                  "product_status" => $request->product_status,
                ]
            );
        }





        if ($product)
        {
            return redirect(route('product.index'))->with('success','İşlem Başarılı');
        }
        return back()->with('error','İşlem Başarısız');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $product=Products::find(intval($id));
       if ($product->delete())
       {
           echo 1;
       }
       echo 0;
    }

    public function sortable()
    {
//        print_r($_POST['item']);

        foreach ($_POST['item'] as $key => $value) {
            $products = Products::find(intval($value));
            $products->product_must = intval($key);
            $products->save();
        }
        echo true;
    }

}
