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
          <form id="formAuthentication" class="mb-3" action="{{ route('CarCharacter.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="_method" value="post">
car_det
          <div>
            <label  class="form-label">car title</label>
            <input type="text" class="form-control"  placeholder="car title"  name="brand"/>
            <br>
          </div>
          <div>
            <label for="defaultFormControlInput" class="form-label">company</label>
            <input type="text" class="form-control" placeholder="company" name="brand_type" />
            <br>
          </div>
          <div>
            <label class="form-label">location</label>
            <input type="text" class="form-control"  placeholder="location" name="JIR" />
            <br>

          </div>
          <div>
            <label  class="form-label">subject</label>
            <input type="number" class="form-control"  placeholder="subject" name="cylinder_number" />
            <br>
          </div>
         
          <br>
          <div>
            <label  class="form-label">car roles description</label>
            <input type="text" class="form-control" name="fuel_type" ></input>
          </div>
          <br>
          <div>
            <label  class="form-label">salary</label>
            <input type="text" class="form-control"  placeholder="salary" name="engine_type" />
<br>          </div>
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