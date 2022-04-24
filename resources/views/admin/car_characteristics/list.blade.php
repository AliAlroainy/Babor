<html>
    <head>
</head>
            <body>
                
            <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>id</th>
            <th>Title</th>
            <th>Company</th>
            <th>Location</th>
            <th>Subject</th>
            <th>Description</th>
            <th>YEAR OF EXPERINCES</th>
            <th>SALARY</th>
            <th>is active</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
         
         @foreach ($car_characteristics as $car)

         <tr>
           <td>{{ $loop->iteration }}</td>
          <td>{{ $car->id }}</td>
          <td>{{ $car->brand }}</td>

          <td>{{ $car->	brand_type}}</td>
          <td>{{ $car->JIR }}</td>
          <td>{{ $car->cylinder_number }}</td>
          <td>{{ $car->engine_type}}</td>
          <td>{{ $car->fuel_type }}</td>
          
          
         
         
          <td>
            @if($car->is_active==1)  
            <span class="badge bg-label-success me-1">مفعل</span>
        
            @else
            <span class="badge bg-label-danger me-1">موقف</span>
            @endif

        </td>
           
            <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('CarCharacter.edit',$car->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
            
                <form action="{{ route('CarCharacter.destroy', $car->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button  title="Delete">Delete</button>
</form></div>
            </div>
          </td>
        </tr>
             
         @endforeach
        
         
        </tbody>
      </table>
    </div>
</body>
                
    </html>