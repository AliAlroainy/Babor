<html>
    <head>
</head>
            <body>
                
        <div class="card-body">
        @if ($errors->any())
          @foreach ($errors->all() as $err)
          <p class="alert alert-danger">{{ $err }}</p>
              
          @endforeach
              
          @endif 
          <form id="formAuthentication" class="mb-3" action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="_method" value="post">

          <div>
            <label  class="form-label">service title</label>
            <input type="text" class="form-control"  placeholder="job title"  name="title"/>
            <br>
          </div>
          <div>
            <label for="defaultFormControlInput" class="form-label">content</label>
            <input type="text" class="form-control" placeholder="company" name="content" />
            <br>
          </div>
          <div>
            <label class="form-label">pic</label>
            <input type="file" class="form-control"  placeholder="location" name="pic" />
            <br>

          </div>
          
         
         
          
<div class="col-md-6">
              <div class="row">
                <label class="col-sm-3 col-form-label text-sm-end" for="formtabs-country">is active</label>
                <div class="col-sm-9">
                  <select  name="is_active" id="formtabs-country" class="select2 form-select" data-allow-clear="true">
                    
                    <option value="1">مفعل</option>
                    <option value="-1">معطل</option>
                  </select>
                </div>
              </div>
            </div>
          <button class="btn btn-primary d-grid w-100">
             Add
            </button>
          </form>
        </div>
</body>
                
    </html>