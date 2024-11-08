<div class="top-bar">

<div class="container">

    <div class="row">

        <div class="col-md-6">

            <div class="social pull-left">

                <ul>

                    <li><a href=""><i class="fa fa-facebook"></i></a></li>

                    <li><a href=""><i class="fa fa-twitter"></i></a></li>

                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>

                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>

                </ul>

            </div>

   </div>

<div class="col-md-6">

<div class="action pull-right">

    <ul>

    @guest('customerGuard')    

<li>
              <!-- Button trigger modal -->
              <a type="" class="" data-toggle="modal" data-target="#loginModal">
                Login
              </a>
            </li>

            <li>

              <!-- Button trigger modal -->
              <a type="" class="" data-toggle="modal" data-target="#exampleModal">
                Register
              </a>
            </li>
            @endguest
            @auth('customerGuard')
            <li> 

              <!-- Button trigger modal -->
              <a href="{{route('view.profile')}}" class="" >
                {{ auth('customerGuard')->user()->name }}
              </a>
            </li>
          
            <li>
            <a href="{{route('customer.logout')}}" 
             >logout</a>
              
            </li>

            @endauth
                </ul>

           @php 
          if(auth('customerGuard')->check())
          {
            $wishList=\App\Models\Wishlist::where('customer_id',auth('customerGuard')->user()->id)->count();
          }else{
            $wishList=0;
          }


          @endphp
          <div>
            <a class="btn" href="">
           <svg fill="red" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.435c-1.989-5.399-12-4.597-12 3.568 0 4.068 3.06 9.481 12 14.997 8.94-5.516 12-10.929 12-14.997 0-8.118-10-8.999-12-3.568z"/></svg>
           ({{$wishList}})  
                          
         </a>
        </div>

            </div> 
 
        </div> 
 
    </div> 
 
</div> 
 
</div>

<div class="header">

<div class="container">

    <div class="row">

        <div class="col-md-3 col-sm-4">

            <div class="logo">

                <a href="index.html">

                    <img style="width: 150px;" src="{{asset('/upload/upload/SArol (1).png')}}" alt="Sarol E-shop">

                </a>

            </div>

        </div>

        <div class="col-md-7 col-sm-5">

            <div class="search-form">

                <form class="navbar-form" role="search" action= "{{route('search')}}">

                    <div class="form-group">

                      <input name= "search_key" value ="{{request()->search_key}}"type="text"  class="form-control"  placeholder="What do you need...">

                    </div>

                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>

                </form>

            </div>

        </div>

        <div class="col-md-2 col-sm-3">

            <div class="cart">

                <div class="cart-icon">

                    <a href="{{route('view.cart')}}">
                      <i class="fa fa-shopping-cart"></i>
                    </a>

                </div>

                <div class="cart-text">

                    SHOPPING CART

                    <br>
 
         

    @if(session()->has('basket'))
    {{count(session()->get('basket'))}}item(s) -{{array_sum(array_column(session()->get('basket'),'subtotal'))}}
    @else
    0 item(s) @endif
           
   

                </div>

            </div>

        </div>

    </div>

</div>

</div>

<div class="navigation">

<nav class="navbar navbar-theme">

  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">

        <span class="sr-only">Menu</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

      </button>

    </div>

    <div class="shop-category nav navbar-nav navbar-left">

        <!-- Single button -->

        <div class="btn-group">

          <button type="button" class="btn btn-shop-category dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            Shop By Category <span class="caret"></span>

          </button>

          <ul class="dropdown-menu">

          @foreach ($categories as $cat)
              
         
            <li><a href="{{route('parts.under.category',$cat->id)}}">{{$cat->name}}</a></li>

            @endforeach
           

          </ul>

        </div>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="navbar">

      <ul class="nav navbar-nav navbar-right" style="flex-direction:row">

        <li><a href="{{route('home')}}">Home</a></li>

        

        <li>
            <a href="{{route('frontend.parts')}}">Parts</a>
        </li>

        <li><a href="#">Features</a></li>

        <li><a href="#">Blog</a></li>

        <li><a href="#">About Us</a></li>

        <li><a href="#">Contact Us</a></li>

      </ul>

    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->

</nav>

</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Customer Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('customer.registration')}}" method="post">
        @csrf
        <div class="modal-body">
          <div>
            <label for="">Enter your name:</label>
            <input required type="text" name="customer_name" placeholder="Enter your name" class="form-control">
          </div>

          <div>
            <label for="">Enter your email:</label>
            <input required type="email" name="email" placeholder="Enter your email" class="form-control">
          </div>

          <div>
            <label for="">Enter your password:</label>
            <input required type="password" name="password" placeholder="Enter your password" class="form-control">
          </div>


          <div>
            <label for="">Retype your password:</label>
            <input required type="password" name="password_confirmation" placeholder="Retype your password" class="form-control">
          </div>

          <div>
            <label for="">Enter your Mobile Number:</label>
            <input required type="tel" name="mobile_number" placeholder="Enter your Mobile number" class="form-control">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Now</button>
        </div>
      </form>


    </div>
  </div>
</div>


<!-- login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Customer Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('customer.login')}}" method="post">
        @csrf
        <div class="modal-body">


          <div>
            <label for="">Enter your email:</label>
            <input required type="email" name="email" placeholder="Enter your email" class="form-control">
          </div>

          <div>
            <label for="">Enter your password:</label>
            <input required type="password" name="password" placeholder="Enter your password" class="form-control">
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">login</button>
        </div>
      </form>


    </div>
  </div>
</div>