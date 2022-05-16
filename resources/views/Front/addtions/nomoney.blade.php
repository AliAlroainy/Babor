@include('Front.include.header')



<div  class="container  shadow-lg p-3 mt-5 mb-5 rounded w-75"  >
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header w-100 d-flex align-items-center justify-content-center text-center" style="top:-80px; " >
				<div >
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_r9doswci.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
				</div>				
			</div>
			<div class="modal-body">
                <h4 class=" w-90 m-3 mt-5">   لايوجد رصيد كافي</h4>	

				<p class="text-center font-50" dir="rtl">رصيدك <strong>0$</strong></p>
			</div>
            <button class="btn btn-success btn-block" >تغذية حسابي 
                <i class="bi bi-cash-stack"></i>
            </button>

			
		</div>
	</div>
</div>   



@include('Front.include.footer')