@extends('frontend.master')


@section('content')

<!-- single Parts view section -->
 <div class="row">
    
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" src="{{url('/upload/upload/'.$singleParts->image)}}" alt="Parts image" style="width: 300px;"></div>
                    <div class="col-md-6">
           
                        <h1 class="display-5 fw-bolder">{{$singleParts->name}}</h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through">{{$singleParts->price}} .BDT</span>
                            <p>Stock: {{$singleParts->stock}} </p>
                           
                        </div>
                        <p class="lead">description here</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem">
                        
                         @if($singleParts->stock>0)
                        <a class="btn btn-primary flex-shrink-0" href="{{route('add.to.cart', $singleParts->id)}}">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                        </a>
                        <a class="btn" href="{{route('add.wishlist',$singleParts->id)}}">
                        <svg fill="red" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.435c-1.989-5.399-12-4.597-12 3.568 0 4.068 3.06 9.481 12 14.997 8.94-5.516 12-10.929 12-14.997 0-8.118-10-8.999-12-3.568z"/></svg>
                        </a>

                        @else
                        <a disabled class="btn btn-primary flex-shrink-0" href="">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                        </a>
                        @endif

                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!-- related Parts section -->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related Parts</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                
                @foreach ($relatedParts as $rp )
                    
               
                <div class="col-md-3">
                        <div class="card h-100">
                            <!-- Parts image-->
                            <img class="card-img-top" src="{{url('/upload/upload/'.$rp->image)}}" alt="..." style="width: 200px;height:200px;">
                            <!-- Parts details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Parts name-->
                                    <h5 class="fw-bolder">{{$rp->name}}</h5>
                                    <!-- Parts price-->
                                   {{ $rp->price }} .BDT
                                </div>
                            </div>
                            <!-- Parts actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
                
            </div>
        </section>


        </div>
@endsection