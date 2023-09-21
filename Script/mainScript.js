import '../style.css'

import { supabase } from "../supabase";

let shop = document.getElementById("shop");

/**
 * ! Basket to hold all the selected items
 * ? the getItem part is retrieving data from the local storage
 * ? if local storage is blank, basket becomes an empty array
 */
const useData = async () => {
  const { data, error } = await supabase.from("Products").select(); // gets the data from supabase
  return data;
};

//let basket = JSON.parse(localStorage.getItem("data")) || [];

let generateShop = async() => {
  return (shop.innerHTML = shopItemsData
    .map((x) => {
      let { id, name, desc, img, price } = x;
      let search = basket.find((y) => y.id === id) || [];
      return `
    <div id=product-id-${id} class="item">
      <img width="220" src=${img} alt="">
      <div class="details">
        <h3>${name}</h3>
        <p>${desc}</p>
        <div class="price-quantity">
          <h2>R ${price} </h2>
          <div class="buttons">
            <i onclick="decrement(${id})" class="bi bi-dash-lg"></i>
            <div id=${id} class="quantity">${search.item === undefined ? 0 : search.item
        }</div>
            <i onclick="increment(${id})" class="bi bi-plus-lg"></i>
          </div>
        </div>
      </div>
  </div>
    `;
    })
    .join(""));
};

generateShop();

/**
 * ! used to increase the selected product item quantity by 1
 */

let increment = (id) => {
  let selectedItem = id;
  let search = basket.find((x) => x.id === selectedItem.id);

  if (search === undefined) {
    basket.push({
      id: selectedItem.id,
      item: 1,
    });
  } else {
    search.item += 1;
  }

  console.log(basket);
  update(selectedItem.id);
  localStorage.setItem("data", JSON.stringify(basket));
};

/**
 * ! used to decrease the selected product item quantity by 1
 */

let decrement = (id) => {
  let selectedItem = id;
  let search = basket.find((x) => x.id === selectedItem.id);

  if (search === undefined) return;
  else if (search.item === 0) return;
  else {
    search.item -= 1;
  }

  update(selectedItem.id);
  basket = basket.filter((x) => x.item !== 0);
  console.log(basket);
  localStorage.setItem("data", JSON.stringify(basket));
};

/**
 * ! To update the digits of picked items on each item card
 */

let update = (id) => {
  let search = basket.find((x) => x.id === id);
  document.getElementById(id).innerHTML = search.item;
  calculation();
};

/**
 * ! To calculate total amount of selected Items
 */

let calculation = () => {
  let cartIcon = document.getElementById("cartAmount");
  cartIcon.innerHTML = basket.map((x) => x.item).reduce((x, y) => x + y, 0);
};

calculation();

/////////////////////////////////

async function renderVegetables() {
  const vegetables = await useData();
  console.log(vegetables);

  const vegetablesContainer = document.getElementById('vegetablesContainer');

  vegetables.forEach((vegetable) => {
    console.log(vegetable);
    const vegetableElement = document.createElement('div');
    vegetableElement.classList.add('vegetable-item'); // You can add a CSS class for styling.

    // Generate the HTML content for the vegetable.
    vegetableElement.innerHTML = `
      <h2>${vegetable.productName}</h2>
      <p>${vegetable.productDescr}</p>
      <!-- Add more properties as needed -->
    `;

    // Append the vegetable element to the container.
    vegetablesContainer.appendChild(vegetableElement);
  });
}

// Call the function to render the vegetables
renderVegetables();

// ...rest of your code



