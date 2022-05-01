
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
  
