@include('Front.include.header')
<style>
                      
    </style>

<div class="container d-flex flex-column align-items-center justify-content-center w-100 h-100" dir="rtl">




<div class="container bootstrap snippets bootdey" >
<section id="services" class="current">
    <div class="services-top">
        <div class="container bootstrap snippets bootdey">
            <div class="row text-center">
                <div class="col-sm-12 col-md-12 col-md-12">
                    <h2 class="text-muted">  ماذا نقدم</h2>
                    <h2 class="section-title" style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;">خدماتنا </h2>
                    <p>نقدم خدمات <span class="highlight">بيع</span> و <span class="highlight">شراء</span> السيارات بشكل سلس وممتع وآمن.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10">
                    <div class="services-list">
                        <div class="row">
                        @foreach ($services as $service)
                           
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div style="display:flex;flex-direction:row"><img class="default-img"
                                     
                                        src="/images/services/serv.png" alt="#" style="width:10%;height:15%;border-radius: 48%;" >
                                        <div class="text-block">  <div class="name " style="padding-right:10px">{{ $service->	title }}</div>
                                    </div></div>
                                    <div class="text-block">
                                       
                                        
                                        <div class="info">{{ $service->	description }}</div>
                                    </div>
                                </div>
                            </div>
                           
                            
                            
                            
                            
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>                    

</div>



@include('Front.include.footer')