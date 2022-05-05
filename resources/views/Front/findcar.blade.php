@include('Front.include.header')



<div class="text-center">
    
         <div class="section-title mt-4" >
             <h2 >  ابحث عن سيارة</h2>
         </div>
    
 </div>


<div class="container h-100" dir="rtl"> 

 <div class="filter">
     <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="false" aria-controls="mobile-filter">فلتر<span class="fa fa-filter pl-1"></span></button>
 </div>

 <div id="mobile-filter">
     <div>
          <div class="input-group rounded" dir="rtl">
               <input type="search" class="form-control rounded" placeholder="بحث" aria-label="Search" aria-describedby="search-addon" />
               {{-- <span class="input-group-text border-0" id="search-addon">
               <i class="fas fa-search"></i>
               </span> --}}
          </div>
     
     </div>

     <div>
          <h6 class="p-1 border-bottom  mt-3">بحث بحسب </h6>
          <p class="mb-2">اللون</p>
          <ul class="list-group">
              <li class="list-group-item list-group-item-action mb-2 rounded"><a href="#">
                  <span class="fa fa-circle pr-1" id="red"></span>احمر
              </a></li>
              <li class="list-group-item list-group-item-action mb-2 rounded"><a href="#">
                  <span class="fa fa-circle pr-1" id="teal"></span>اخضر
              </a></li>
              <li class="list-group-item list-group-item-action mb-2 rounded"><a href="#">
                  <span class="fa fa-circle pr-1" id="blue"></span>ازرق
              </a></li>
          </ul>
     </div>

     <div>
          <h6>النوع</h6>
          <form class="ml-md-2">
              <div class="form-inline border rounded p-sm-2 my-2">
                  <input type="radio" name="type" id="boring">
                  <label for="boring" class="pl-1 pt-sm-0 pt-1">نقل</label>
              </div>
              <div class="form-inline border rounded p-sm-2 my-2">
                  <input type="radio" name="type" id="ugly">
                  <label for="ugly" class="pl-1 pt-sm-0 pt-1">شاحنات</label>
              </div>
              <div class="form-inline border rounded p-md-2 p-sm-1">
                  <input type="radio" name="type" id="notugly">
                  <label for="notugly" class="pl-1 pt-sm-0 pt-1">باصات </label>
              </div>
          </form>
     </div>
 </div>



 <div id="sidebar">

     <div>


      <div class="input-group rounded" dir="rtl">
          <input type="search" class="form-control rounded" placeholder="بحث" aria-label="Search" aria-describedby="search-addon" />
          {{-- <span class="input-group-text border-0" id="search-addon">
          <i class="fas fa-search"></i>
          </span> --}}
     </div>



     </div>

     <div>
         <h6 class="p-1 border-bottom mt-3">بحث بحسب </h6>
         <p class="mb-2">اللون</p>
         <ul class="list-group">
             <li class="list-group-item list-group-item-action mb-2 rounded"><a href="#">
                 <span class="fa fa-circle pr-1" id="red"></span>احمر
             </a></li>
             <li class="list-group-item list-group-item-action mb-2 rounded"><a href="#">
                 <span class="fa fa-circle pr-1" id="teal"></span>اخضر
             </a></li>
             <li class="list-group-item list-group-item-action mb-2 rounded"><a href="#">
                 <span class="fa fa-circle pr-1" id="blue"></span>ازرق
             </a></li>
         </ul>
     </div>

     <div>
         <h6>النوع</h6>
         <form class="ml-md-2">
             <div class="form-inline border rounded p-sm-2 my-2">
                 <input type="radio" name="type" id="boring">
                 <label for="boring" class="pl-1 pt-sm-0 pt-1">نقل</label>
             </div>
             <div class="form-inline border rounded p-sm-2 my-2">
                 <input type="radio" name="type" id="ugly">
                 <label for="ugly" class="pl-1 pt-sm-0 pt-1">شاحنات</label>
             </div>
             <div class="form-inline border rounded p-md-2 p-sm-1">
                 <input type="radio" name="type" id="notugly">
                 <label for="notugly" class="pl-1 pt-sm-0 pt-1">باصات </label>
             </div>
         </form>
     </div>
 </div>


 <div id="products" class="h-100 ">
 <div class="container">
     <div class="row">

         <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
             <div class="single-product">
                                                <div class="product-img">
                                                    <a href="/details">
                                                        <img class="default-img" src="img/babor.jpg" alt="#">
                                                        <img class="hover-img" src="img/babor.jpg" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                    <div class="product-price">
                                                        <span>$29.00</span>
                                                    </div>
                                                </div>
                                            </div>
         </div>
  
         <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>


      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>


      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>


      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>


      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>



      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>

      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>


      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>


      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>


      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>

      <div class="col-lg-3 col-sm-4 col-11 offset-sm-0 offset-1">
          <div class="single-product">
                                             <div class="product-img">
                                                 <a href="/details">
                                                     <img class="default-img" src="img/babor.jpg" alt="#">
                                                     <img class="hover-img" src="img/babor.jpg" alt="#">
                                                 </a>
                                                 <div class="button-head">
                                                     <div class="product-action">
                                                         <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                         <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                         <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                     </div>
                                                     <div class="product-action-2">
                                                         <a title="Add to cart" href="#">Add to cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="product-content">
                                                 <h3><a href="/details">Awesome Bags Collection</a></h3>
                                                 <div class="product-price">
                                                     <span>$29.00</span>
                                                 </div>
                                             </div>
                                         </div>
      </div>




         </div>

  </div>

</div>

<!-- end product -->


</div>






@include('Front.include.footer')