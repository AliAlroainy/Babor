@include('Front.include.header')



<div class="text-center">
	<!-- Button HTML (to Trigger Modal) -->
	<a href="#myModal" class="trigger-btn" data-toggle="modal">اضغط لالغاء الدفع</a>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header w-100 d-flex align-items-center justify-content-center text-center" style="top:-80px; " >
				<div >
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_fil5eda6.json"  background="transparent"  speed="1"  style="width: 150px; height: 150px;"  loop  autoplay></lottie-player>
				</div>				
			</div>
			<div class="modal-body">
                <h4 class=" w-90 m-3 mt-5"> تمت  الغاء العملية</h4>	

			</div>
            <button class="btn btn-success btn-block" data-dismiss="modal">حسناً</button>

			
		</div>
	</div>
</div>   



@include('Front.include.footer')
