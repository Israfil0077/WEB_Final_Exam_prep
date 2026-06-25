# WEB_Final_Exam_prep

Whenever you face a JavaScript DOM manipulation question in your exam, you should
always follow this 4-step framework.
1.1 Step 1: HTML Structure & Script Linking
Never mix your HTML structure with your JavaScript logic. Create a clean user interface
using <input>, <button>, and <div> or <label> tags for the output. Crucial Rule:
Always link your script.js file at the very bottom of the <body>. This ensures the
HTML elements exist before JavaScript tries to select them.
1 <body>
2 <input type= " text " id= " myInput ">
3 <button id= " myBtn " >Submit< / button>
4 <div id=" output "></ div>
5
6 < ! -- Link JS right before the closing body tag -->
7 <script src= " script .js"></ script>
8 </ body>

1.2 Step 2: Global State Management (Memory)
If the exam asks you to ”keep track” of something (like the number of attempts or a
running total of calories), you MUST declare these variables outside of any functions.
If you declare them inside the function, they will reset to zero every time the user clicks
the button!

1

1 // GLOBAL SCOPE : Remembers values across multiple button clicks
2 let totalAttempts = 0;
3 let runningScore = 0;

1.3 Step 3: Event Listeners & Data Extraction
Instead of adding onclick="" inside your HTML, use addEventListener in your JS file.
Inside this listener, extract the user’s input using .value. Remember to convert text to
numbers if you plan to do math!
1 document . getElementById (" myBtn ") . addEventListener (" click ", function () {
2 // Grab the input element and read its value
3 let inputString = document . getElementById (" myInput ") . value ;
4
5 // Convert to a number ( Crucial for math / comparisons )
6 let userNumber = parseInt ( inputString ) ;
7
8 // Validate input to prevent errors
9 if ( isNaN ( userNumber ) ) return ;
10
11 totalAttempts ++; // Update global state
12 }) ;

1.4 Step 4: Specialized Logic & Updating the UI
Once you process the logic, you must push the result back to the HTML screen.
• Updating Text: Use .innerHTML (if you want to include <br> or spans) or
.innerText.
• Disabling Elements: Use .disabled = true to lock inputs or buttons (often
required in games or password checkers after a certain number of tries).
• Regex (.test): Use /[A-Z]/.test(string) to check if a string contains uppercase
letters (or lowercase, numbers, etc.).
• Math.random: Use Math.floor(Math.random() * (Max - Min + 1)) + Min to
generate whole random numbers.