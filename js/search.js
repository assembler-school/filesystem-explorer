const searchInput = document.querySelector("#searchInput");
const searchInputForm = document.querySelector("#searchInputForm");

searchInput.addEventListener("keyup", searchElements);

function searchElements(){
    searchInputForm.submit();
}

/* function searchElements(){
    let a = searchInput.value;
    fetch("modules/searchRecursive.php?searchImput=" + searchInput.value, {
        method: "GET",
    })
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        /* data.forEach(element =>
            filesListSecondChild.innerHTML += element)
    })
    .catch((err) => console.log("Request failed: ", err));
}*/