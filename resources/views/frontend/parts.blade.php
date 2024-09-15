@extends('frontend.master')


@section('content')

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">


    @foreach ($parts as $par )
        
    <a href="{{route('show.parts',$par->id)}}">
      <div class="col-md-12 col-lg-4 mb-3 mb-lg-0">       
         <div class="card text-black">
          <img style="width: 150px;" src="{{url('/upload/upload/'.$par->image)}}"
            class="card-img-top" alt="iPhone" width="50px" />
          <div class="card-body">
            <div class="text- mt-2">
              <h2 class="card-title">{{$par->name}}</h2>
              @if($par->discount>0)
              <span class="badge badge-success">{{$par->discount}}%</span>
              @endif
              
                </div>

            <div class="text-">
              <div class="p-3 mx-n3 mb-3" style="background-color: #eff1f2;">
                <h5 class="mb-0">Category: {{$par->category->name}}</h5>
              </div>
              <div class="d-flex flex-column mb-4 lead">
              @if($par->discount>0)
                <span class="mb-2"><del>{{$par->price}} BDT</del></span>
                <span class="mb-2">{{$par->price - ($par->price/$par->discount)}} BDT</span>
                @else
                <span class="mb-2">{{$par->price}} BDT</span>
                @endif
                <p>Stock : {{$par->stock >0 ?  $par->stock : 'out of stock'}}</p>
              </div>
              
              
            </div>

            <div class="d-flex flex-row">
           @if ($par->stock > 0)
           
           
              <a href="{{route('add.to.cart',$par->id)}}" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
                Add to cart
              </a>
              <a class="btn" href="{{route('add.wishlist',$par->id)}}">
              <svg fill="red" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.435c-1.989-5.399-12-4.597-12 3.568 0 4.068 3.06 9.481 12 14.997 8.94-5.516 12-10.929 12-14.997 0-8.118-10-8.999-12-3.568z"/></svg>
               </a>
    
            @else
              <a disabled href="" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
                Add to cart
              </a>

              @endif
              
              </button>
              <!-- <a href="{{route('view.cart')}}"  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger flex-fill ms-1" data-mdb-ripple-color="dark">Buy now</a> -->
            </div>
          </div>
        </div>
      </div>
      </a>
      @endforeach
    
    </div>
  </div>
</section>




@endsection