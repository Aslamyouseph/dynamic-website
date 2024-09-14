// Review box
const container = document.querySelector(".container");
const emoji = document.querySelector(".emoji");
const nameField = document.querySelector(".name-field");
const textarea = document.querySelector(".textarea");
const btn = document.querySelector(".btn");

emoji.addEventListener("click", (e) => {
  if (e.target.className.includes("emoji")) return;
  nameField.classList.add("name-field--active");
  textarea.classList.add("textarea--active");
  btn.classList.add("btn--active");
});
container.addEventListener("mouseleave", () => {
  nameField.classList.remove("name-field--active");
  textarea.classList.remove("textarea--active");
  btn.classList.remove("btn--active");
});
