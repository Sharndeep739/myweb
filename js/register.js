let form= document.getElementById("registerForm");

form.addEventListener("submit",async function(event){
    event.preventDefault();

    let name=  document.getElementById("name").value;
    let email= document.getElementById("email").value;
    let password= document.getElementById("password").value;
    if(name==""||email==""||password==""){
        alert("plese fill the form");
        return;
    }
    const obj = {
        name: name,
        email: email,
        password: password
    };

    try{
        const response = await fetch("action/register.php",{
            method:"POST",
            headers:{
                "Content-Type":"application/json"
            },
            body:JSON.stringify(obj)
        });
    
            const data = await response.json();
            alert(data.message);
            if(data.status){
                window.location.href="dashboard.php"
            }
    }catch(error){
        alert("somthing wrong "+error);
    }

});
