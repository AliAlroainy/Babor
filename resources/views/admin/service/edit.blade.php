<html>
    <head>
</head>
            <body>
                
            <h5 class="card-header">Edite service detials</h5>
        <div class="card-body">
          @if ($errors->any())
          @foreach ($errors->all() as $err)
          <p class="alert alert-danger">{{ $err }}</p>
              
          @endforeach
              
          @endif
          




          <form method="POST" action="{{ route('service.update',$services->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PATCH");
            
            <div class="row g-3">
            <div>
            <label  class="form-label">service title</label>
            <input type="text" class="form-control" value="{{ $services->title }}"  placeholder="service title"  name="title"/>
            <br>
          </div>
          <div>
            <label for="defaultFormControlInput" class="form-label">company</label>
            <input type="text" class="form-control"  value="{{ $services->content }}" placeholder="company" name="content" />
            <br>
          </div>
          <div>
            <label class="form-label">location</label>
            <input type="file" class="form-control" value="{{ $services->pic }}" placeholder="location" name="pic" />
            <br>

          </div>
          
            
              
            <div class="col-md-6">
              <div class="row">
                <label class="col-sm-3 col-form-label text-sm-end" for="formtabs-country">is active</label>
                <div class="col-sm-9">
                  <select  name="is_active" id="formtabs-country" class="select2 form-select" data-allow-clear="true">
                    
                    <option @if($services->is_active==1) selected @endif value="1">مفعل</option>
                    <option  @if($services->is_active==-1) selected @endif value="-1">معطل</option>
                  </select>
                </div>
              </div>
            </div>
            
            
           
          </div>



          
        </div>
        <div class="card-footer">
          <input type="submit" name="submit" id="formtabs-first-name"  value="تعديل"class="form-control" placeholder="John" />

        </form>


        </div>
</body>
                
    </html>