//image slider setup in homepage
let next = document.querySelector(".next");
let prev = document.querySelector(".prev");
function nextSlide() {
  let items = document.querySelectorAll(".item");
  document.querySelector(".slide").appendChild(items[0]);
}
function prevSlide() {
  let items = document.querySelectorAll(".item");
  document.querySelector(".slide").prepend(items[items.length - 1]);
}
// Attach event listeners for manual sliding
next.addEventListener("click", nextSlide);
prev.addEventListener("click", prevSlide);
// Auto-slide function
function autoSlide() {
  nextSlide(); // Move to the next slide
}
// Set the interval for automatic sliding (e.g., every 1 seconds)
let slideInterval = setInterval(autoSlide, 1000);
// Optional: Pause auto-slide on hover
// let container = document.querySelector(".container");
// container.addEventListener("mouseover", () => {
//   clearInterval(slideInterval);
// });
// container.addEventListener("mouseout", () => {
//   slideInterval = setInterval(autoSlide, 3000);
// });

//top laptopes (scrolling method)
function leftScroll() {
  const scrollContainer = document.querySelector(".scroll-images");
  scrollContainer.scrollBy({
    left: -scrollContainer.clientWidth / 4,
    behavior: "smooth",
  });
}
function rightScroll() {
  const scrollContainer = document.querySelector(".scroll-images");
  scrollContainer.scrollBy({
    left: scrollContainer.clientWidth / 4,
    behavior: "smooth",
  });
}
function autoScroll() {
  const scrollContainer = document.querySelector(".scroll-images");
  const maxScrollLeft =
    scrollContainer.scrollWidth - scrollContainer.clientWidth;

  if (scrollContainer.scrollLeft >= maxScrollLeft) {
    // If we've reached the end, reset to the beginning
    scrollContainer.scrollTo({
      left: 0,
      behavior: "smooth",
    });
  } else {
    // Otherwise, keep scrolling right
    scrollContainer.scrollBy({
      left: scrollContainer.clientWidth / 4,
      behavior: "smooth",
    });
  }
}
setInterval(autoScroll, 2500); // Automatically scroll every 2 seconds

//latest news(scrolling section)
function leftScroll1() {
  const scrollContainer = document.querySelector(".scroll-images1");
  scrollContainer.scrollBy({
    left: -scrollContainer.clientWidth / 4,
    behavior: "smooth",
  });
}
function rightScroll1() {
  const scrollContainer = document.querySelector(".scroll-images1");
  scrollContainer.scrollBy({
    left: scrollContainer.clientWidth / 4,
    behavior: "smooth",
  });
}
function autoScroll1() {
  const scrollContainer = document.querySelector(".scroll-images1");
  const maxScrollLeft =
    scrollContainer.scrollWidth - scrollContainer.clientWidth;

  if (scrollContainer.scrollLeft >= maxScrollLeft) {
    // If we've reached the end, reset to the beginning
    scrollContainer.scrollTo({
      left: 0,
      behavior: "smooth",
    });
  } else {
    // Otherwise, keep scrolling right
    scrollContainer.scrollBy({
      left: scrollContainer.clientWidth / 4,
      behavior: "smooth",
    });
  }
}
setInterval(autoScroll1, 2000); // Automatically scroll every 2 seconds

//user feed back section
$(document).ready(function () {
  var cards = $("#card-slider .slider-item").toArray();

  function startAnim(array) {
    if (array.length >= 4) {
      gsap.fromTo(
        array[0],
        { x: 0, y: 0, opacity: 0.75 },
        {
          x: 0,
          y: -120,
          opacity: 0,
          zIndex: 0,
          delay: 0.03,
          ease: "power1.inOut",
          onComplete: function () {
            sortArray(array);
          },
        }
      );

      gsap.fromTo(
        array[1],
        { x: 79, y: 125, opacity: 1, zIndex: 1 },
        {
          x: 0,
          y: 0,
          opacity: 0.75,
          zIndex: 0,
          boxShadow: "-5px 8px 8px 0 rgba(82,89,129,0.05)",
          ease: "power1.inOut",
        }
      );

      gsap.to(array[2], {
        x: 79,
        y: 125,
        boxShadow: "-5px 8px 8px 0 rgba(82,89,129,0.05)",
        zIndex: 1,
        opacity: 1,
        ease: "power1.inOut",
      });

      gsap.fromTo(
        array[3],
        { x: 0, y: 400, opacity: 0, zIndex: 0 },
        {
          x: 0,
          y: 250,
          opacity: 0.75,
          zIndex: 0,
          ease: "power1.inOut",
        }
      );
    } else {
      $("#card-slider").append(
        "<p>Sorry, the carousel should contain more than 3 slides</p>"
      );
    }
  }

  function sortArray(array) {
    setTimeout(function () {
      var firstElem = array.shift();
      array.push(firstElem);
      startAnim(array);
    }, 3000);
  }

  startAnim(cards);
});
//search bar
const postsData = [
  {
    title: "GamingLaptops",
    url: "/mini_project2/GamingLaptops.php",
  },
  { title: "Budget Laptops", url: "/mini_project2/BudgetLaptops.php" },
  { title: "Business Laptops", url: "/mini_project2/BusinessLaptops.php" },
  { title: "Student Laptops", url: "/mini_project2/StudentLaptops.php" },
  { title: "Who need tablets", url: "/mini_project2/Who_need_tablets.php" },
  { title: "2 in one", url: "/mini_project2/two_in_one.php" },
  { title: "Cart Section", url: "/mini_project2/Cart.html" },
  { title: "News", url: "/mini_project2/News.php" },
  { title: "Review", url: "/mini_project2/Review.php" },
  { title: "Services", url: "/mini_project2/Services.html" },
  { title: "About us", url: "/mini_project2/About.html" },
  { title: "Contact Us", url: "/mini_project2/Contact.html" },
  { title: "Lenovo Legion Slim 5 Gen 8", url: "/mini_project2/laptop1.html" },
  { title: "MSI Cyborg 15 (2023)", url: "/mini_project2/laptop2.html" },
  {
    title: "Acer Nitro V 15 (ANV15-51-59MT)",
    url: "/mini_project2/laptop3.html",
  },
  { title: "Alienware m18 R2", url: "/mini_project2/laptop4.html" },
  { title: "MSI Titan 18 HX", url: "/mini_project2/laptop5.html" },
  { title: "Gigabyte Aero 16 OLED", url: "/mini_project2/laptop6.html" },
  { title: "Acer Chromebook 516 GE", url: "/mini_project2/laptop7.html" },
];

const searchInput = document.getElementById("search");
const searchResults = document.getElementById("search-results");

const handleSearchInput = (event) => {
  const query = event.target.value.toLowerCase();
  searchResults.innerHTML = "";

  if (query.length > 1) {
    const filteredData = postsData.filter((item) =>
      item.title.toLowerCase().includes(query)
    );

    filteredData.forEach((item) => {
      const resultItem = document.createElement("a");
      resultItem.href = item.url;
      resultItem.textContent = item.title;
      searchResults.appendChild(resultItem);
    });

    searchResults.style.display = filteredData.length ? "block" : "none";
  } else {
    searchResults.style.display = "none";
  }
};

searchInput.addEventListener("input", handleSearchInput);

document.addEventListener("click", (e) => {
  if (!searchResults.contains(e.target) && e.target !== searchInput) {
    searchResults.style.display = "none";
  }
});

//popup for user subscription
const loginPopup = document.querySelector(".login-popup");
const close = document.querySelector(".close");

window.addEventListener("load", function () {
  showPopup();
});

function showPopup() {
  const timeLimit = 20; //time delay (How much time is needed to popup the login page)
  let i = 0;
  const timer = setInterval(function () {
    i++;
    if (i == timeLimit) {
      clearInterval(timer);
      loginPopup.classList.add("show");
    }
  }, 1000);
}

close.addEventListener("click", function () {
  loginPopup.classList.remove("show");
});
