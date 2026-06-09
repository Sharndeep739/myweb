async function loadProducts(){
    const response = await fetch("action/get_Product.php");
    const products = await response.json();

    let rows = "";

    products.forEach(product => {
        rows += `
            <tr>
                <td>${product.id}</td>
                <td>
                    <img src="uploads/${product.image}" width="60">
                </td>
                <td>${product.category_name}</td>
                <td>${product.name}</td>
                <td>₹${product.price}</td>
                <td>${product.stock}</td>
            </tr>
        `;

    });

    document.getElementById("productTable").innerHTML = rows;
}

loadProducts();