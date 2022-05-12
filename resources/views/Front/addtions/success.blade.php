@include('Front.include.header')



<div class="text-center">
	<!-- Button HTML (to Trigger Modal) -->
	<a href="#myModal" class="trigger-btn" data-toggle="modal">اضغط لتاكيد الدفع</a>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header w-100 d-flex align-items-center justify-content-center text-center" style="top:-100px; " >
				<div >
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets8.lottiefiles.com/temp/lf20_xG4aYa.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
				</div>				
			</div>
			<div class="modal-body">
                <h4 class=" w-90 m-3 mt-5"> تمت العملية بنجاح</h4>	

				<p class="text-center">تم تاكيد اكمال الدفع </p>
			</div>
            <button class="btn btn-success btn-block" data-dismiss="modal">حسناً</button>

			
		</div>
	</div>
</div>   



@include('Front.include.footer')
