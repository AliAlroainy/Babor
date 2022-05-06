

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


      
var searchFilterState = () => {
  let selectedCar = document.getElementById("filterByState").value;
  console.log(selectedCar);
  // const input = document.querySelector(".form-control");
  const cards = document.getElementsByClassName("state");
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
