<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function addToWishList($id)
    {

        $checkWishlist=WishList::where('parts_id',$id)
        ->where('customer_id',auth('customerGuard')->user()->id)
        ->first();

        if($checkWishlist)
        {
            notify()->error('Already exist.');
            return redirect()->back();
        }
        
        WishList::create([
            'parts_id'=>$id,
            'customer_id'=>auth('customerGuard')->user()->id
        ]);


        notify()->success('Parts added to wishlist.');

        return redirect()->back();

    }
}
