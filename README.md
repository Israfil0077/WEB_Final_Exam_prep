# JavaScript DOM Manipulation Exam Framework

Whenever you face a JavaScript DOM Manipulation question in an exam, follow this **4-Step Framework**. This approach works for most event-driven problems such as calculators, password validators, guessing games, counters, score trackers, and form validation tasks.

---

## Step 1: HTML Structure & Script Linking

Keep your **HTML structure** and **JavaScript logic** separate.

Create the user interface using elements like:

* `<input>`
* `<button>`
* `<div>`
* `<label>`

### Important Rule

Always link your `script.js` file **at the bottom of the `<body>` tag**. This ensures that all HTML elements are loaded before JavaScript tries to access them.

```html
<body>
    <input type="text" id="myInput">
    <button id="myBtn">Submit</button>
    <div id="output"></div>

    <!-- Link JS right before closing body tag -->
    <script src="script.js"></script>
</body>
```

---

## Step 2: Global State Management (Memory)

If the problem requires you to **keep track of values** across multiple button clicks (such as attempts, scores, totals, or counters), declare those variables in the **global scope**.

### Why?

Variables declared inside a function reset every time the function runs.

```javascript
// GLOBAL SCOPE
let totalAttempts = 0;
let runningScore = 0;
```

✅ These values persist between button clicks.

❌ Do not declare them inside the event listener if they need to remember previous values.

---

## Step 3: Event Listeners & Data Extraction

Instead of using `onclick=""` in HTML, use `addEventListener()` in JavaScript.

### Basic Workflow

1. Detect the button click.
2. Read user input using `.value`.
3. Convert text to numbers if needed.
4. Validate the input.
5. Update the global state.

```javascript
document.getElementById("myBtn").addEventListener("click", function () {

    // Read input value
    let inputString = document.getElementById("myInput").value;

    // Convert string to number
    let userNumber = parseInt(inputString);

    // Validate input
    if (isNaN(userNumber)) return;

    // Update global state
    totalAttempts++;
});
```

### Key Methods

| Method               | Purpose                        |
| -------------------- | ------------------------------ |
| `.value`             | Get input field value          |
| `parseInt()`         | Convert string to integer      |
| `parseFloat()`       | Convert string to decimal      |
| `isNaN()`            | Check if value is not a number |
| `addEventListener()` | Handle events properly         |

---

## Step 4: Logic Processing & UI Updates

After processing the data, display the result back to the user interface.

### Updating Text

```javascript
document.getElementById("output").innerText = "Success!";
```

or

```javascript
document.getElementById("output").innerHTML =
    "Attempt 1<br>Correct!";
```

Use:

* `.innerText` → Plain text
* `.innerHTML` → Text with HTML tags

---

### Disabling Elements

Useful for games, login attempts, and validation systems.

```javascript
document.getElementById("myBtn").disabled = true;
```

---

### Regular Expressions (Regex)

Used for checking specific patterns in strings.

#### Check for Uppercase Letter

```javascript
/[A-Z]/.test(password)
```

#### Check for Lowercase Letter

```javascript
/[a-z]/.test(password)
```

#### Check for Number

```javascript
/[0-9]/.test(password)
```

---

### Random Number Generation

Generate a whole number between **Min** and **Max** (inclusive).

```javascript
Math.floor(Math.random() * (Max - Min + 1)) + Min
```

#### Example

```javascript
let randomNumber =
    Math.floor(Math.random() * (10 - 1 + 1)) + 1;
```

Generates a number between **1 and 10**.

---

# Quick Exam Checklist ✅

Before submitting your solution, verify:

* [ ] HTML elements are created correctly.
* [ ] `script.js` is linked at the bottom of `<body>`.
* [ ] Global variables are outside functions.
* [ ] Event listener is attached properly.
* [ ] Input is extracted using `.value`.
* [ ] String is converted to a number when needed.
* [ ] Input validation is performed.
* [ ] Logic is processed correctly.
* [ ] UI is updated using `.innerText` or `.innerHTML`.
* [ ] Buttons/inputs are disabled if required.
* [ ] Regex is used for pattern checking when needed.
* [ ] `Math.random()` formula is correct for random numbers.

---

## DOM Manipulation Formula to Remember

```text
Select Element
      ↓
Add Event Listener
      ↓
Get Input Value
      ↓
Validate Input
      ↓
Process Logic
      ↓
Update Global State
      ↓
Update UI
```

Master this workflow, and most DOM manipulation exam questions become much easier to solve.
