@include('Front.include.header')


<div class="card">
    <div class="card-header bg-black"></div>
    <div class="card-body">
  
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <i class="far fa-building text-danger fa-6x float-start"></i>
          </div>
        </div>
  
  
        <div class="row">
          <div class="col-xl-12">
  
            <ul class="list-unstyled float-end">
              <li style="font-size: 30px; color: red;">Company</li>
              <li>123, Elm Street</li>
              <li>123-456-789</li>
              <li>mail@mail.com</li>
            </ul>
          </div>
        </div>
  
        <div class="row text-center">
          <h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">Invoice</h3>
          <p>123456789</p>
        </div>
  
        <div class="row mx-3">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Description</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Samsung TV</td>
                <td><i class="fas fa-dollar-sign"></i> 500,00</td>
              </tr>
              <tr>
                <td>JBL Speaker</td>
                <td><i class="fas fa-dollar-sign"></i> 300,00</td>
              </tr>
              <tr>
                <td>Macbook Air</td>
                <td><i class="fas fa-dollar-sign"></i> 1000,00</td>
              </tr>
              <tr>
                <td>Iphone 11 PRO</td>
                <td><i class="fas fa-dollar-sign"></i> 5000,00</td>
              </tr>
            </tbody>
          </table>
  
        </div>
        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled float-end me-0">
              <li><span class="me-3 float-start">Total Amount:</span><i class="fas fa-dollar-sign"></i> 6850,00
              </li>
              <li> <span class="me-5">Discount:</span><i class="fas fa-dollar-sign"></i> 500,00</li>
              <li><span class="float-start" style="margin-right: 35px;">Shippment: </span><i
                  class="fas fa-dollar-sign"></i> 500,00</li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-8" style="margin-left:60px">
            <p class="float-end"
              style="font-size: 30px; color: red; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
              Total:
              <span><i class="fas fa-dollar-sign"></i> 6350,00</span></p>
          </div>
  
        </div>
  
        <div class="row mt-2 mb-5">
          <p class="fw-bold">Date: <span class="text-muted">23 June 20221</span></p>
          <p class="fw-bold mt-3">Signature:</p>
        </div>
  
      </div>
  
  
  
    </div>
    <div class="card-footer bg-black"></div>
  </div>



@include('Front.include.footer')