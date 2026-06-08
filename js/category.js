//fetc data from category
async function loadCategories(){
    try{
        const response = await fetch("action/get_category.php");
        const data = await response.json();
        let rows = "";

        data.forEach(category => {

            rows += `
                <tr>
                    <td>${category.id}</td>
                    <td>${category.category_name}</td>
                    <td>
                    

                        <button onclick="deleteCategory(${category.id})">
                            Delete
                        </button>
                    </td>
                </tr>
            `;

        });

        document.getElementById("categoryTable").innerHTML = rows;
    }catch(error){
        console.log(error);
    }

}

loadCategories();

// add new category
document.getElementById("categoryForm")
.addEventListener("submit",async function(event){
    event.preventDefault();

    let category_name =
    document.getElementById("category_name").value;

    if(category_name == ""){
        alert("Enter Category Name");
        return;
    }

    const obj = {
        category_name :category_name
    };

    try{
        const response= await fetch("action/add_category.php",{
            method:"POST",
            headers:{
                "Content-Type":"application/json"
            },
            body:JSON.stringify(obj)
        });
        const data= await response.json();

        alert(data.message);

    }catch(error){
        alert("somthing wrong "+error);

}


});


