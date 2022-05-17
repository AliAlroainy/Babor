@extends('partials.usermaster')
@section('body')
    <!-- partial -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rokkitt:wght@100;400&display=swap');

*{
    margin:0;
    padding:0;
}

 
 
 .cardp{
     height:220px;
     width:330px;
     border-radius:20px;
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
        </style>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">المحفظة</h4>

                         
                        </div>
                    </div>
                </div>

            </div>

            <div class="container">
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

        </div>

        
    @endsection
