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
           
            <th>is active</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
         
         @foreach ($services as $service)

         <tr>
           <td>{{ $loop->iteration }}</td>
          <td>{{ $service->id }}</td>
          <td>{{ $service->title }}</td>

          <td>{{ $service->	content}}</td>
          <td> <img src="/images/{{ $service->pic }}" alt="Avatar" class="rounded-circle"></td>
          
         
         
          <td>
            @if($service->is_active==1)  
            <span class="badge bg-label-success me-1">مفعل</span>
        
            @else
            <span class="badge bg-label-danger me-1">موقف</span>
            @endif

        </td>
           
            <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
              <form action="{{ route('service.destroy', $service->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button  title="Delete">Delete</button>
</form>
                <a class="dropdown-item" href="{{ route('service.edit',$service->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                    <i class="bx bx-trash me-2"></i> @if($service->is_active==1)disable @else enable @endif</a>
              </div>
            
            </div>
          </td>
        </tr>
             
         @endforeach
        
         
        </tbody>
      </table>
    </div>
</body>
                
    </html>