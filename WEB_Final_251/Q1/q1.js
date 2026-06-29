function pass() {
    let input1 = document.getElementById("input1").value;

    if (input1.length > 6) {
        document.getElementById("show").innerText = "kaj hocche";
    } else {
        document.getElementById("show").innerText = "kaj hobe na";
    }
}