@include('Front.include.header')


<div class="container d-flex flex-column align-items-center justify-content-center w-100  mb-5" dir="rtl">

    <img src="svg\faq.svg" width="500" alt="404" />

    <div class="row">
      <div class="col-12">
          <div class="section-title mt-4" >
              <h2 >  الاسئلة الشائعة</h2>
          </div>
      </div>
  </div>

  <div class="accordion accordion-flush w-100" id="accordionFlushExample">
  @foreach ($questions as $question)
  <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading{{ $question->idText}}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $question->idText}}" aria-expanded="false" aria-controls="flush-collapse{{ $question->idText}}">
        {{ $question->question}}        </button>
      </h2>
      <div id="flush-collapse{{ $question->idText}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $question->idText}}" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">{{ $question->answer}} .</div>
      </div>
    </div>
    @endforeach
   
  </div>

  </div>

@include('Front.include.footer')