@extends('partials.usermaster')
@section('body')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row ">

                <div class="col-lg-12 grid-margin stretch-card" style="width: 100%">
                    <div class="cardp d-flex align-items-center justify-content-center">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <h1 class="card-title">
                                <i class="bi bi-cash-stack"></i>
                                المحفظة</h1>

                         
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="container">
                <div class="cardp">
                    <span class="line-1"></span>
                    <span class="line-2"></span>
                    <span class="line-3"></span>
                    <div class="top-row">
                        <div class="visa">
                            <h4>VISA</h4>
                            <span>علي الرعيني</span>
                        </div>
                        <div class="tick">
                            <i class="fa fa-check"></i>
                        </div>
                     
                    </div>
                    
                  
                    <div class="bottom-row">
                            <div class="dots">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            
                            <span class="number">4564</span>
                    </div>
                  
                    
                </div>
                
            </div>
 --}}

        
 <div class="container"> 
    <div class="row">

    <div class="col-md-7 col-12"> 
        <div class=""> 
                <div class="col-12 mb-4"> 
                    <div class="row box-right">
                        <div class="col-md-8 ps-0 ">
                            <p class="ps-3 textmuted fw-bold h6 mb-0">اجمالي الرصيد</p> 
                            <p class="h1 fw-bold d-flex" > <span class=" fas fa-dollar-sign textmuted pe-1 h6 align-text-top mt-1"></span> <span class="textmuted">58.</span>   84,254   </p>
                            <p class="ms-3 mt-5 px-2 bg-green">غذي حسابك</p>
                            </div> 
                            <div class="col-md-4"> 
                                <p class="p-blue"> 
                                    <span class="fas fa-circle pe-2"></span>الداخل </p>
                                     <p class="fw-bold mb-3"><span class="fas fa-dollar-sign pe-1"></span>1254 <span class="textmuted">.50</span> </p>
                                      <p class="p-org"><span class="fas fa-circle pe-2"></span>الخارج </p> <p class="fw-bold"><span class="fas fa-dollar-sign pe-1"></span>00<span class="textmuted">.00</span></p>
                                     </div> </div> </div> 
                                     <div class="col-12 px-0 mb-4"> 
                                         <div class="box-right"> 
                                             <div class="d-flex pb-2"> 
                                                 <p class="fw-bold h7">
                                                    <i class="bi bi-clock-history"></i>
                                                     <span class="textmuted">المحفظة/</span>العمليات المالية</p>
                                                      <p class="ms-auto p-blue">  </p> 
                                                    </div> 
                                                    <div class="bg-blue p-2 mb-3"> 
                                                        <P class="h6 textmuted">شراء سيارة فيراري بقيمة 23421$ 
                                                            <p class="p-blue bg btn btn-primary h7">التفاصيل</p>
                                                         </P> 
                                                        </div>
                                                                                                     
                                                        <div class="bg-blue p-2 mb-3"> 
                                                            <P class="h6 textmuted">شراء سيارة فيراري بقيمة 23421$ 
                                                                <p class="p-blue bg btn btn-primary h7">التفاصيل</p>
                                                             </P> 
                                                            </div>
                                                               
                                                            <div class="bg-blue p-2  mb-3"> 
                                                                <P class="h7 textmuted">شراء سيارة فيراري بقيمة 23421$ 
                                                                    <p class="p-blue bg btn btn-primary h6">التفاصيل</p>
                                                                 </P> 
                                                                </div>
                                                                       
                                                    
                                                    </div> 
                                                </div> 
                                                <div class="col-12 px-0 "> 
                                                    </div> </div> </div> 



        <div class="col-12 col-md-5  ps-md-5 p-0 "> 
            <div class="box-left"> 
                <div class="d-flex"> 
                <i class="bi bi-receipt"></i>
                <p class="textmuted h8 me-3">  الفاتورة #3424</p> 
            </div>
                <p class="fw-bold h7">شراء سيارة فيراري</p> 
                <p class="textmuted h8">البائع : ابرار الخرساني</p> 
                <p class="textmuted h8">المشتري : علي الرعيني</p> 

                <p class="textmuted h8 mb-2">التاريخ : 23-1-2023</p> 
                <div class="h8"> <div class="row m-0 border mb-3"> 
                    <div class="col-6 h8 pe-0 ps-2"> <p class="textmuted py-2">العناصر</p> 
                        <span class="d-block py-2 border-bottom">سيارة فيراري</span> 
                        <span class="d-block py-2">سيارة هامر</span> </div> 
                        <div class="col-2 text-center p-0"> <p class="textmuted p-2">الكمية</p> 
                            <span class="d-block p-2 border-bottom">2</span> 
                            <span class="d-block p-2">1</span> </div> 
                            <div class="col-2 p-0 text-center h8 border-end"> <p class="textmuted p-2">السعر</p> 
                                <span class="d-block border-bottom py-2"><span class="fas fa-dollar-sign"></span>500</span>
                                    <span class="d-block py-2 "><span class="fas fa-dollar-sign"></span>400</span> 
                                </div> <div class="col-2 p-0 text-center">
                                        <p class="textmuted p-2">الاجمالي</p> <span class="d-block py-2 border-bottom">
                                            <span class="fas fa-dollar-sign"></span>1000</span> 
                                            <span class="d-block py-2">
                                                <span class="fas fa-dollar-sign"></span>400</span>
                                                </div> 
                                            </div> 
                                            <div class="d-flex h7 mb-2"> 
                                                <p class="ms-5">الاجمالي الكلي:</p> 
                                                <p class="ms-auto">
                                                    <span class="fas fa-dollar-sign"></span>1400</p> 
                                                </div> 
                                                <div class="h8 mb-5"> 
                                                    <p> التفاصيل </p>
                                                    <p class="textmuted"> وسيلة الدفع منصة وصل  </p> 
                                                </div> </div> 
                                                                                                                   
                                                                                                                               </div>
                                                                                                                            </div>

                                                                                                                            
                                                                                                                         </div>
 </div>













</div> 


     

        
        
    </div>
    </div>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rokkitt:wght@100;400&display=swap');

*{
    margin:0;
    padding:0;
}

 
 
 .cardp{
     height:220px;
     width: 100%;
     border-radius:10px;
     background-image:linear-gradient(to top right, #393938,#F7941D);
     padding:10px;
     padding-right:20px;
     padding-left:20px;
     color:#fff;
     position:relative;
      overflow:hidden;
      cursor:pointer;
 }
 
 .cardp .line-1{
     height:200px;
     width:200px;
     display:flex;
     clip-path: polygon(50% 0%, 15% 100%, 78% 100%);
     opacity:0.6;
     background:#1e45b3;
     position:absolute;
     bottom:90px;
     right:-30px;
     transform:rotate(45deg);
     animation:anim 3s infinite;
     
      
 }
 
  .cardp .line-2{
     height:300px;
     width:300px;
     display:flex;
     clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
     opacity:0.4;
     background:#1e45b3;
     position:absolute;
     top:-30px;
     right:-30px;
     transform:rotate(70deg);
     animation:anim 3s infinite;
     animation-delay:2s;
 }
 
   .cardp .line-3{
     height:200px;
     width:200px;
     display:flex;
     clip-path: polygon(100% 0, 0 55%, 78% 100%);
     opacity:0.3;
     background:#1e45b3;
     position:absolute;
     top:-30px;
     right:-30px;
     transform:rotate(70deg);
     animation:anim 3s infinite;
     animation-delay:4s;
 }
 
 @keyframes anim{
     from{
         opacity:0.3;
      transform:rotate(0deg);
       
     }
     
     to{
         opacity:0.8;
         transform:rotate(180deg);
         
     }
 }
 
 
 
 .visa h4{
     font-size:40px;
     font-family: 'Rokkitt', serif;
     
 }
 
 .visa span{
     margin-left:2px;
     font-family: 'Rokkitt', serif;
 }
 
 .visa img{
     width:50px;
 }
 
 .cardp .visa i{
     font-size:50px;
     
 }
 .tick{
     height:25px;
     width:25px;
     background-color:#7587c5;
     border-radius:7px;
     color:#fff;
     display:flex;
     justify-content:center;
     align-items:center;
     font-size:15px;
     margin-top:6px;
 }
 
 .tick i{
     transition:all 1s;
 }
 
 .cardp:hover .tick i{
     
     transform: rotate(360deg);
 }
 .top-row{
      display: flex;
    justify-content: space-between;
     
    position: relative;

 }
 
 .bottom-row{
     display:flex;
     flex-direction:row;
     align-items:center;
     position:absolute;
     bottom:20px;
     
 }
 
 .bottom-row .dots{
     display:flex;
     flex-direction:row;
     margin-right:7px;
 }
 
 .bottom-row .dots span{
     height:6px;
     width:6px;
     background-color:#fff;
     border-radius:50%;
     margin:0 2px;
 }
 
 .bottom-row .number{
     font-size:20px;
     font-weight:600;
 }


.box-right {
    padding: 30px 25px;
    background-color: white;
    border-radius: 10px;
    margin-left: 6px;
}

.box-left {
    padding: 20px 20px;
    background-color: white;
    border-radius: 10px
}

.textmuted {
    color: #7a7a7a
}

.bg-green {
    background-color: #d4f8f2;
    color: #06e67a;
    padding: 3px 0;
    display: inline;
    border-radius: 25px;
    font-size: 11px
}

.p-blue {
    font-size: 14px;
    color: #1976d2
}

.fas.fa-circle {
    font-size: 12px
}

.p-org {
    font-size: 14px;
    color: #fbc02d
}

.h7 {
    font-size: 15px
}

.h8 {
    font-size: 12px
}

.h9 {
    font-size: 10px
}

.bg-blue {
    background-color: #dfe9fc9c;
    border-radius: 5px
}



.far.fa-credit-card {
    position: absolute;
    top: 10px;
    padding: 0 15px
}

.fas,
.far {
    cursor: pointer
}

.cursor {
    cursor: pointer
}

.btn.btn-primary {
    box-shadow: none;
    height: 40px;
    padding: 11px
}

.bg.btn.btn-primary {
    background-color: transparent;
    border: none;
    color: #1976d2
}

.bg.btn.btn-primary:hover {
    color: #539ee9
}

@media(max-width:320px) {
    .h8 {
        font-size: 11px
    }

    .h7 {
        font-size: 13px
    }

    ::placeholder {
        font-size: 10px
    }
}

        </style>

    @endsection
