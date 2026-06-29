const secret = Math.floor(Math.random() * (5000 - 500 + 1)) + 500;
let attempts = 0;
const MAX = 5;

function pass() {
    let input1 = Number(document.getElementById('Guess_number').value);
    attempts++;

    if (input1 === secret) {
        document.getElementById('feedback').innerText = "Correct!";
        document.getElementById('result').innerText = "You got it in " + attempts + " guess(es)!";
        document.getElementById('Guess_number').disabled = true;
        document.getElementById('button').disabled = true;
    } else if (attempts >= MAX) {
        document.getElementById('feedback').innerText = input1 > secret ? "Too high!" : "Too low!";
        document.getElementById('result').innerText = "Out of guesses! The number was " + secret;
        document.getElementById('Guess_number').disabled = true;
        document.getElementById('button').disabled = true;
    } else {
        document.getElementById('feedback').innerText = input1 > secret ? "Too high!" : "Too low!";
        document.getElementById('result').innerText = "Attempts: " + attempts + " / " + MAX;
    }

    document.getElementById('Guess_number').value = '';
}

document.getElementById('button').addEventListener('click', pass);
