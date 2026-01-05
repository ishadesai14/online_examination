Front end code for adding questions from teacher side
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Create New Paper</title>
 <style>
 /* Basic styling for the form */
 body {
 font-family: Arial, sans-serif;
 margin: 0;
 padding: 0;
 background-color: #f5f5f5;
 }
 /* Header styles */
 header {
 background-color: #000; /* Dark background */
 color: #fff;
 padding: 15px 0;
 font-size: 20px;
 text-align: left;
 position: fixed; /* Fixed position */
 width: 100%; /* Full width */
 top: 0; /* Stick to the top */
 z-index: 1000; /* Ensure it's on top of other content */
 }
 header nav ul {
 list-style-type: none;
 margin: 0;
 padding: 0;
 overflow: hidden; /* Ensure it doesn't affect layout */
 }
 header nav ul li {
 display: inline-block;
 margin-right: 30px;
 }
 header nav ul li a {
 color: #fff;
 text-decoration: none;
 transition: color 0.3s;
 }
 header nav ul li a:hover {
 color: #8c8c8c;
 }
 /* Container styling */
 .container {
 max-width: 800px;
 margin: 100px auto 50px auto; /* Adjust margin for fixed header */
 padding: 20px;
 background-color: #fff;
 border-radius: 8px;
 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 }
 h1 {
 text-align: center;
 color: #333;
 }
 form {
 margin-top: 20px;
 }
 .form-group {
 margin-bottom: 20px;
 }
 label {
 display: block;
 font-weight: bold;
 }
 input[type="text"],
 input[type="number"] {
 width: 100%;
 padding: 10px;
 border: 1px solid #ccc;
 border-radius: 5px;
 }
 .options-group {
 margin-bottom: 10px;
 }
 .options-group input {
 margin-right: 10px;
 }
 input[type="submit"] {
 display: block;
 width: 100%;
 padding: 10px;
 background-color: #007bff;
 color: #fff;
 border: none;
 border-radius: 5px;
 cursor: pointer;
 }
 input[type="submit"]:hover {
 background-color: #0056b3;
 }
 .add-question-btn {
 background-color: #28a745;
 color: #fff;
 border: none;
 padding: 5px 10px;
 border-radius: 5px;
 cursor: pointer;
 }
 .add-question-btn:hover {
 background-color: #218838;
 }
 .radio-container {
 display: inline-block;
 margin-right: 10px; /* Add margin to the right of radio buttons */
 }
 .logout-button {
 float: right;
 }
 /* Footer styling */
 footer {
 background-color: #000;
 color: #fff;
 padding: 15px 0; /* Increased padding */
 position: fixed; /* Fixed position */
 bottom: 0; /* Stick to the bottom */
 width: 100%; /* Full width */
 }
 footer p {
 margin: 0;
 font-size: 1.1em; /* Larger font size */
 text-align: center;
 }
 /* Center heading styles */
 .center-heading {
 text-align: center;
 }
 </style>
</head>
<body>
 <!-- Header Section -->
 <header>
    <nav>
 <ul>
 <li><a href="home_teacher.php">Home</a></li>
 <li><a href="student_results.php">View Results</a></li>
 <li><a href="question.php">Add Question</a></li>
 <li><a href="render_question.php">Show Question</a></li>
 <li class="logout-button"><a href="../index.php">Log Out</a></li>
 </ul>
 </nav>
 </header>
 <div class="container">
 <h1>Add New Question</h1>
 <form action="question_back.php" method="POST" id="paper-form">
 <!-- Subject field -->
 <div class="form-group">
 <label for="subject">Subject:</label>
 <input type="text" id="subject" name="subject" required>
 </div>
 <div id="questions-container">
 <!-- Questions will be dynamically added here -->
 </div>
 <!-- Hidden input field to hold the value of questionCount -->
  <input type="hidden" id="questionCount" name="questionCount"
value="0">
 <!-- Button to add new question -->
 <button type="button" class="add-question-btn"
onclick="addQuestion()">Add Question</button>
 <!-- Form submission button -->
 <div class="form-group">
 <input type="submit" value="Create Paper">
 </div>
 </form>
 </div>
 <!-- Footer Section -->
 <footer>
 <div class="contact-info">
 <p>Contact Us: ishadesai1409@gmail.com</p>
 </div>
 <div class="social-media"></div>
 <div class="copyright">
 <p>&copy; 2024 Online Examination. All rights reserved.</p>
 </div>
 </footer>
 <!-- JavaScript to dynamically add questions -->
 <script>
    // Function to add a new question input field
 function addQuestion() {
 // Get the container where questions will be added
 var container = document.getElementById('questions-container');
 // Get the current question count
 var questionCount =
parseInt(document.getElementById('questionCount').value);
 // Increment the question count
 questionCount++;
 // Update the hidden input field with the new questionCount value
 document.getElementById('questionCount').value = questionCount;
 // Create the question input field
 var questionInput = document.createElement('input');
 questionInput.type = 'text';
 questionInput.name = 'question' + questionCount;
 questionInput.id = 'question' + questionCount; // Added id
 questionInput.placeholder = 'Enter question text';
 container.appendChild(questionInput);
 container.appendChild(document.createElement('br'));
 // Create the options input fields
 for (var i = 1; i <= 4; i++) {
 var optionInput = document.createElement('input');
 optionInput.type = 'text'
 optionInput.name = 'question' + questionCount + '_option' + i;
 optionInput.id = 'question' + questionCount + '_option' + i; // Added id
 optionInput.placeholder = 'Option ' + i;
 container.appendChild(optionInput);
 container.appendChild(document.createElement('br'));
 }
 // Create the label for correct answer radio buttons
 var correctAnswerLabel = document.createElement('label');
 correctAnswerLabel.innerText = 'Correct Answer: ';
 container.appendChild(correctAnswerLabel);
 // Create the radio buttons for selecting the correct answer
 for (var i = 1; i <= 4; i++) {
 // Create a container for each radio button and label
 var radioContainer = document.createElement('div');
 radioContainer.classList.add('radio-container');
 // Create the radio button
 var optionRadio = document.createElement('input');
 optionRadio.type = 'radio';
 optionRadio.name = 'question' + questionCount + '_correct';
 optionRadio.id = 'question' + questionCount + '_correct' + i; // Added id
 optionRadio.value = i;
 radioContainer.appendChild(optionRadio);
 // Create the label for the radio button
 var optionLabel = document.createElement('label');
 optionLabel.innerText = 'Option ' + i;
 optionLabel.htmlFor = 'question' + questionCount + '_correct' + i;
// Added htmlFor
 radioContainer.appendChild(optionLabel);
 // Add the radio button and label to the container
 container.appendChild(radioContainer);
 }
 // Add a line break after the radio buttons
 container.appendChild(document.createElement('br'));
 }
 // Verify questionCount before form submission
 document.getElementById('paper-form').addEventListener('submit', function(e)
{
 var questionCount = document.getElementById('questionCount').value;
 console.log("questionCount before submission:", questionCount); //
Debugging
 });
 </script>
</body>
</html>