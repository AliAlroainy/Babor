
//////////////// filtering
$('.filter').change(function(){

  filter_function();
  
  //calling filter function each select box value change
  
});

$('.Auction_card .Auction_filed ').show(); //intially all rows will be shown

function filter_function(){
  $('.Auction_card .Auction_filed ').hide(); //hide all rows
  
  var companyFlag = 0;
  var companyValue = $('#filter-auction').val();

  //setting intial values and flags needed
  
 //traversing each row one by one
  $('.Auction_filed').each(function() {  
  
    if(companyValue == 0){   //if no value then display row
    companyFlag = 1;
    }
    else if(companyValue == $(this).find('td.name').data('name')){ 
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
