let searchBarInput = document.getElementById("search__bar--input");
let searchBarInputContainer = document.getElementById(
  "search__bar--main--container"
);

searchBarInput.addEventListener("keyup", handle_change_input);
searchBarInputContainer.addEventListener("mouseover", handle_open_input);
searchBarInputContainer.addEventListener("mouseout", handle_close_input);

function handle_change_input() {
	let searchBarInputValue = document.getElementById("search__bar--input").value;
	let searchBarInputValueText = JSON.stringify(searchBarInputValue);
  searchBarInputContainer.style.display = "block";
	// console.log(searchBarInputValueText);

	// $.post('../../php/search_bar/search_bar.php', {xml: searchBarInputValueText });

	$.ajax({
		url: '../../php/search_bar/search_bar.php',
		type: 'post',
		data:  {"inputSearch": searchBarInputValue},
		success: function(response) {
			// console.log(response);
			searchBarInputContainer.innerHTML = response;
			// console.log(searchBarInputValue);
		}
	});

}
function handle_open_input() {
  searchBarInputContainer.style.display = "block";
}
function handle_close_input() {
    searchBarInputContainer.style.display = "none";
}
