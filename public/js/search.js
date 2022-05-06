

    var searchFilter = () => {
      let selectedCar = document.getElementById("filterByCar").value;
      console.log(selectedCar);
      // const input = document.querySelector(".form-control");
      const cards = document.getElementsByClassName("series");
      console.log(cards[1])
      // let textBox = input.value;
      for (let i = 0; i < cards.length; i++) {
          // let title = cards[i].querySelector(".card-body");
          if ((cards[i].classList.contains(selectedCar) || selectedCar=="") ) {
              cards[i].classList.remove("d-none");
          } else {
              cards[i].classList.add("d-none");
          }
      }
    }


/////////////////////////filter brand


      
var searchFilterBrand = () => {
  let selectedCar = document.getElementById("filterByBrand").value;
  console.log(selectedCar);
  // const input = document.querySelector(".form-control");
  const cards = document.getElementsByClassName("brand");
  console.log(cards[1])
  // let textBox = input.value;
  for (let i = 0; i < cards.length; i++) {
      // let title = cards[i].querySelector(".card-body");
      if ((cards[i].classList.contains(selectedCar) || selectedCar=="") ) {
          cards[i].classList.remove("d-none");
      } else {
          cards[i].classList.add("d-none");
      }
  }
}



/////////////////////////filter status


//////////////// filtering
$('.filter2').change(function(){

  filter_function2();
  
  //calling filter function each select box value change
  
});

$('.Auction_card .status_filed ').show(); //intially all rows will be shown

function filter_function2(){
  $(' .status_filed ').hide(); //hide all rows
  
  var companyFlag = 0;
  var companyValue = $('#filter-status').val();

  //setting intial values and flags needed
  
 //traversing each row one by one
  $('.status_filed').each(function() {  
  
    if(companyValue == 0){   //if no value then display row
    companyFlag = 1;
    }
    else if(companyValue == $(this).find('h4.status').data('status')){ 
      companyFlag = 1;       //if value is same display row
    }
    else{
      companyFlag = 0;
    }
    
    

   if(companyFlag ){
     $(this).show();  //displaying row which satisfies all conditions
   }

});   
}

