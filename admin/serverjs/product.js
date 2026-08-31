const products = [
  {
    id: 1,
    name: "FUJIFILM X-T5",
    price: "300 per jam",
    description: [
      "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      "Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde."
    ],
    details: {
      color: "Black",
      availability: "In stock",
      category: "Camera"
    },
    images: [
      "../assets/img_produk/FUJIFILM X-T5.png",
      "../assets/img_produk/199.png",
      "../assets/img_produk/SONY A6000.png",
      "shoe_4.jpg"
    ]
  },
  {
    id: 2,
    name: "Adidas Sneakers",
    price: "250 per jam",
    description: [
      "Stylish and comfortable sneakers for daily use.",
      "Perfect for workouts and casual outings."
    ],
    details: {
      color: "White",
      availability: "In stock",
      category: "Shoes",
      shippingArea: "Local only",
      shippingFee: "$10"
    },
    images: [
      "sneaker_1.jpg",
      "sneaker_2.jpg",
      "sneaker_3.jpg"
    ]
  },
];





function renderProducts() {
  const productList = document.querySelector('#product-list');
  products.forEach(product => {
    const productItem = document.createElement('div');
    productItem.innerHTML = `
      <h2>${product.name}</h2>
      <p>${product.price}</p>
      <button onclick="showProduct(${product.id})">Detail</button>
    `;
    productList.appendChild(productItem);
  });
}

renderProducts();
function showProduct(productId) {
  const product = products.find(p => p.id === productId);
  if (product) {
    document.querySelector('.product-title').textContent = product.name;
    document.querySelector('.product-price').textContent = product.price;

    const descriptionList = document.querySelector('.product-description');
    descriptionList.innerHTML = '';
    product.description.forEach(desc => {
      const listItem = document.createElement('li');
      listItem.textContent = desc;
      descriptionList.appendChild(listItem);
    });
  }
}
function backToList() {
  document.getElementById('product-detail').style.display = 'none';
  document.getElementById('product-list').style.display = 'block';
}
