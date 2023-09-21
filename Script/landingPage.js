import '../style.css'

import { supabase } from "../supabase";

const useData = async () => {
  const { data, error } = await supabase.from("Products").select(); // gets the data from supabase
  return data;
};

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


