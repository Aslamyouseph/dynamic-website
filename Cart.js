// Cart-related functionality
const btnEl = document.getElementById("icart");
const cartContainerEl = document.querySelector(".cart-container");
const cartCloseEl = document.getElementById("cart-close");
const cartContentEl = document.querySelector(".cart-content");
const cartCountEl = document.getElementById("cart-count");
const totalValueEl = document.querySelector(".total-price");

let cartItems = [];

btnEl.addEventListener("click", () => {
  cartContainerEl.classList.add("cart-active");
});

cartCloseEl.addEventListener("click", () => {
  cartContainerEl.classList.remove("cart-active");
});

document.querySelectorAll(".btn-cart").forEach((btn, index) => {
  btn.addEventListener("click", () => addToCart(index));
});

function addToCart(index) {
  const product = document.querySelectorAll(".products")[index];
  const productTitle = product.querySelector(".product-title-link").innerText;
  const productPrice = product
    .querySelector(".price")
    .innerText.replace("Rs.", "");
  const productImg = product.querySelector(".product-img").src;

  const cartItem = {
    title: productTitle,
    price: parseFloat(productPrice),
    img: productImg,
    quantity: 1,
  };

  const existingItemIndex = cartItems.findIndex(
    (item) => item.title === cartItem.title
  );

  if (existingItemIndex !== -1) {
    // If item exists, update its quantity
    cartItems[existingItemIndex].quantity += 1;
  } else {
    // If item doesn't exist, add it to the cart
    cartItems.push(cartItem);
  }

  updateCart();
}

function updateCart() {
  cartContentEl.innerHTML = "";
  cartItems.forEach((item, index) => {
    const cartBox = document.createElement("div");
    cartBox.classList.add("cart-box");

    cartBox.innerHTML = `
      <img src="${item.img}" alt="${item.title}" class="cart-img">
      <div class="detail-box">
        <div class="cart-food-title">${item.title}</div>
        <div class="price-box">
          <div class="cart-price">Rs.${item.price}</div>
          <input type="number" value="${item.quantity}" class="cart-quantity" min="1">
        </div>
      </div>
      <i class="bi bi-trash cart-remove"></i>
    `;

    cartContentEl.appendChild(cartBox);

    // Update quantity
    const quantityInput = cartBox.querySelector(".cart-quantity");
    quantityInput.addEventListener("change", () => {
      item.quantity = parseInt(quantityInput.value);
      if (item.quantity < 1) item.quantity = 1;
      updateCart();
    });

    // Remove item from cart
    const removeBtn = cartBox.querySelector(".cart-remove");
    removeBtn.addEventListener("click", () => {
      cartItems.splice(index, 1);
      updateCart();
    });
  });

  // Update cart count and total price
  const itemCount = cartItems.reduce((count, item) => count + item.quantity, 0);
  cartCountEl.textContent = itemCount;
  cartCountEl.style.display = itemCount > 0 ? "block" : "none";

  const totalPrice = cartItems.reduce(
    (total, item) => total + item.price * item.quantity,
    0
  );
  totalValueEl.textContent = `Rs.${totalPrice}`;
}
