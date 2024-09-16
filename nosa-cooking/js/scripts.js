function toggleAnswer(id) {
    var answer = document.getElementById(id);
    if (answer.style.display === "none") {
        answer.style.display = "block";
    } else {
        answer.style.display = "none";
    }
}

// function toggleAnswer(id) {
//     var answer = document.getElementById(id);
//     var question = document.querySelector("#" + id).previousElementSibling;
//     if (answer.style.display === "none") {
//       answer.style.display = "block";
//     //   question.querySelector(".dropdown-icon").innerHTML = "&#9650;"; // Change icon to up arrow
//     } else {
//       answer.style.display = "none";
//     //   question.querySelector(".dropdown-icon").innerHTML = "&#9660;"; // Change icon to down arrow
//     }
//   }