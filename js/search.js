const searchBar = document.getElementById("searchBar");
const filterDropdown = document.getElementById("filterDropdown");
const items = document.querySelectorAll(".item");

function filterProducts() {
  const searchQuery = searchBar.value.trim().toLowerCase();
  const selectedCategory = filterDropdown.value;

  items.forEach(item => {
    const productName = item.querySelector(".product-title").textContent.trim().toLowerCase();
    const category = item.querySelector(".category").textContent.trim();

    const matchesSearch = productName.includes(searchQuery);
    const matchesCategory = selectedCategory === "All" || category === selectedCategory;

    item.style.display = matchesSearch && matchesCategory ? "flex" : "none";
  });
}

searchBar.addEventListener("input", filterProducts);
filterDropdown.addEventListener("change", filterProducts);
