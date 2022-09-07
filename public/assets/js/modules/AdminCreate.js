let products = document.querySelectorAll(".each-product");

let parentDiv = document.querySelector(".amounts");

let cost = document.querySelector(".cost");
products.forEach(product=>{
    product.onclick = function (){
        let flag= true;

        let amounts =  document.querySelectorAll(".amounts div");
        amounts.forEach(amount=>{
            if (amount.classList[0] == product.querySelector("h5").textContent.toLowerCase())
            {
                flag = false;
            }
        })
        if (flag){
        let div =  document.createElement("div");
        div.className = product.querySelector("h5").textContent.toLowerCase();
        div.style.marginBottom= "20px";
        let span = document.createElement("span");
        span.innerText = product.querySelector("h5").textContent.toLowerCase();
        let input = document.createElement("input");
        input.type="text";
        input.value=1;
        input.style.outline="none";
        input.style.marginLeft="10px";
        input.name= product.querySelector("h5").textContent.toLowerCase();

        let increment = document.createElement('span');
        increment.textContent = "Add";
        increment.style.cursor="pointer";
        increment.style.backgroundColor="green";
        increment.style.borderRadius="10px";
        increment.style.padding="10px";
        increment.style.marginLeft="10px";
        increment.onclick = function(){
            input.value= parseInt(input.value) + 1;
            cost.value = parseInt(cost.value) + parseInt(product.querySelector("span").textContent);
        }

        let decrement = document.createElement('span');
        decrement.textContent = "minus";
        decrement.style.cursor="pointer";
        decrement.style.backgroundColor="red";
        decrement.style.borderRadius="10px";
        decrement.style.padding="10px";
        decrement.style.marginLeft="10px";
        decrement.onclick = function(){
            input.value= parseInt(input.value) - 1;
            if (input.value== 0){
                div.remove();
            }
            cost.value = parseInt(cost.value) - parseInt(product.querySelector("span").textContent);
        }

        cost.value = parseInt(cost.value) + parseInt(product.querySelector("span").textContent);
        div.appendChild(span);
        div.appendChild(input);
        div.appendChild(increment);
        div.appendChild(decrement);
        parentDiv.append(div);
        }

    }
})
