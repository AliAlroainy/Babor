<html>
    <head>
</head>
            <body>
                
            <h5 class="card-header">Edite job detials</h5>
        <div class="card-body">
          @if ($errors->any())
          @foreach ($errors->all() as $err)
          <p class="alert alert-danger">{{ $err }}</p>
              
          @endforeach
              
          @endif
          
        
          <form method="POST" action="{{ route('CarCharacter.update',$car_characteristics->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PATCH");
            <div class="row g-3">
            <div>
            <label  class="form-label">job title</label>
            <input type="text" class="form-control" value="{{ $car_characteristics->brand }}"  placeholder="job title"  name="brand"/>
            <br>
          </div>
          <div>
            <label for="defaultFormControlInput" class="form-label">company</label>
            <input type="text" class="form-control"  value="{{ $car_characteristics->brand_type }}" placeholder="company" name="brand_type" />
            <br>
          </div>
          <div>
            <label class="form-label">location</label>
            <input type="text" class="form-control" value="{{ $car_characteristics->JIR }}" placeholder="location" name="JIR" />
            <br>

          </div>
          <div>
            <label  class="form-label">subject</label>
            <input type="text" class="form-control" value="{{ $car_characteristics->cylinder_number }}" placeholder="subject" name="cylinder_number" />
            <br>
          </div>
          
          <br>
          <div>
            <label  class="form-label">job roles description</label>
            <textarea class="form-control" value="{{ $car_characteristics->engine_type}}" name="engine_type" rows="3"></textarea>
          </div>
          <br>
          <div>
            <label  class="form-label">salary</label>
            <input type="text" class="form-control" value="{{ $car_characteristics->fuel_type }}"  placeholder="salary" name="fuel_type" />
<br>          </div>
            
              
            <div class="col-md-6">
              <div class="row">
                <label class="col-sm-3 col-form-label text-sm-end" for="formtabs-country">is active</label>
                <div class="col-sm-9">
                  <select  name="is_active" id="formtabs-country" class="select2 form-select" data-allow-clear="true">
                    
                    <option @if($car_characteristics->is_active==1) selected @endif value="1">مفعل</option>
                    <option  @if($car_characteristics->is_active==-1) selected @endif value="-1">معطل</option>
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