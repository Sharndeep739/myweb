//load ceotgiry
async function loadCategories(){

    const response = await fetch("action/get_category.php");

    const data = await response.json();

    let options =`<option value="">Select Category</option>`;

    data.forEach(category => {

        options += `
            <option value="${category.id}">
                ${category.category_name}
            </option>
        `;

    });

    document.getElementById("category_id").innerHTML = options;
}

loadCategories();

// add products
let addPro =document.getElementById("productForm");
addPro.addEventListener("submit", async function(event){

    event.preventDefault();

    let category_id = document.getElementById("category_id").value;
    let name = document.getElementById("name").value;
    let price =document.getElementById("price").value;
    let stock =document.getElementById("stock").value;
    let image =document.getElementById("image").files[0];

    if(category_id == "" ||name == "" ||price == "" ||stock == "" ||!image){
        alert("Please fill all fields");
        return;
    }

    const formData = new FormData();

    formData.append("category_id",category_id);
    formData.append("name",name);
    formData.append("price",price);

    formData.append("stock",stock);

    formData.append("image",image);

    try{

        const response = await fetch("action/add_product.php",
            {
                method:"POST",
                body:formData
            }
        );

        const data =await response.json();

        if(data.status){
            window.location.reload();
            alert(data.message);
        }

    }catch(error){

        console.log(error);

    }

});