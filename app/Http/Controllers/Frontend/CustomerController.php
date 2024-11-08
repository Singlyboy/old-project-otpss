<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //

    public function registration(Request $request)
    {

       //step1 validation
        $validation=Validator::make($request->all(),[
            'customer_name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6|confirmed',
            'mobile_number'=>'required|digits:11|numeric'
            
        ]);

        if($validation->fails())
        {
            notify()->error($validation->getMessageBag());
            return redirect()->back();
        }

    

       Customer::create([
        
        'name'=>$request->customer_name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'mobile'=>$request->mobile_number
       ]);

       notify()->success('Customer Registration Successful.');

       return redirect()->back();



    }

    public function customerLogin(Request $request)
    {

       
       //step1 validation
       $validation=Validator::make($request->all(),[
        'email'=>'required|email',
        'password'=>'required|min:6',
        ]);

    if($validation->fails())
    {
        notify()->error($validation->getMessageBag());
       
        return redirect()->back();
    }

   
       //condition for login
          $credentials=$request->except('_token');
       
       $check=auth('customerGuard')->attempt($credentials);
    

       if($check){
        notify()->success('Login Success');
       
        return redirect()->route('home');
       }else
       {
        notify()->error('Login failed.');

        return redirect()->route('home');
       }
    }
    public function customerLogout()
    {
    
        Auth::guard('customerGuard')->logout();
        session()->forget('basket');  
        notify()->success('logout!');     
      
  
        return redirect()->route('home');
  } 

  public function viewProfile()
  {

      $orders=Order::where('customer_id',auth('customerGuard')->user()->id)->get();
      
      return view('frontend.pages.profile',compact('orders'));
  }
  public function cancelOrder ($id)
  {
    $order=Order::find($id);
    $order->update([
        'status'=>'cancel'
    ]);
    $items=OrderDetail::where('order_id',$id)->get();
    foreach($items as $item)
    {
     $parts=Part::find($item->parts_id);

     $parts->increment('stock',$item->parts_quantity);
    }

    
    notify()->success('Order cancelled.');
    return redirect()->back();

  }
}

