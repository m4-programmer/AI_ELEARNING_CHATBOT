<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/styles/vs2015.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/highlight.min.js"></script>
<script>
  hljs.initHighlightingOnLoad();
</script>
<!-- Include the clipboard.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>


# E-Learning Chatbot Documentation
This is a documentation for the E-Learning Chatbot system. The system is built using Laravel and BotMan, and it provides an interface for students to ask questions and get responses.

## Overview
The E-Learning Chatbot system is designed to provide a platform for students to ask questions and get responses on various topics related to their studies. The system uses a natural language processing (NLP) engine to understand the questions asked by the students and provide appropriate responses.

Architecture
The E-Learning Chatbot system is built using the following technologies:

- Laravel: Laravel is a web application framework that provides a set of tools and features for building web applications. The E-Learning Chatbot system uses Laravel to provide a RESTful API for interacting with the system.

- BotMan: BotMan is a PHP framework for building chatbots. The E-Learning Chatbot system uses BotMan to implement the chatbot functionality.

- MySQL: MySQL is a popular relational database management system. The E-Learning Chatbot system uses MySQL to store the questions and answers that the chatbot uses to respond to student queries.

- NLP: The E-Learning Chatbot system uses natural language processing (NLP) to understand the questions asked by the students and provide appropriate responses.

The following diagram shows the architecture of the E-Learning Chatbot system:


## Functionality
The E-Learning Chatbot system provides the following functionality:

Ask a question: Students can ask questions by sending a message to the chatbot.

Get a response: The chatbot provides a response to the student's question using the questions and answers stored in the MySQL database.

Email registration: If the chatbot is unable to answer the student's question, the chatbot provides a message requesting the student to leave their email address and full name so they can be connected to a representative who can help them.

## Usage
The E-Learning Chatbot system can be accessed using the following API endpoints:
- Get /api/v1/chatbot: This endpoint is used to ask a question. The student sends a message to the chatbot by sending a GET request to this endpoint with the 'question' params in the request body.

- POST /api/v1/chatbot: This endpoint is used to ask a question. The student sends a message to the chatbot by sending a POST request to this endpoint with the 'question' in the request body.
The response from the API is a JSON object with the following fields:

- data: The response from the chatbot to the student's question.
message: A message indicating whether the request was successful or not.

## Conclusion

The E-Learning Chatbot system provides an easy and convenient way for students to get answers to their questions. The system uses natural language processing to understand the questions asked by the students and provide appropriate responses. The system is built using Laravel and BotMan and provides a RESTful API for interacting with the system. The system is also backed by a MySQL database to store the questions and answers.


# Requirements
- PHP 8.2 and above
- MySQL
- SQL file with the necessary data entries (can be found in the root folder of the AIchatbot folder, with the name e_learning_bot.sql, you will need to import this file in your mysql)
- Composer (for installing dependencies)

## Setup Instructions
1. Download and install PHP 8.2 and above from the official PHP website: https://www.php.net/downloads
2. Download and install MySQL from the official MySQL website: https://dev.mysql.com/downloads/
3. Download the sql.sql file from the root folder of the AIchatbot folder.
4. Install Composer by following the instructions on their official website: https://getcomposer.org/download/
5. Clone the repository from GitHub: git clone https://github.com/<username>/<project-name>.git
6. Navigate to the project directory and run composer install to install all dependencies.
7. Generate a PHP key with the command php artisan key:generate.
8. Create a .env file in the root directory of the project, and set the following environment variables:
<!-- Add a button to copy the code -->
<button class="btn" data-clipboard-target="#code-block">Copy code</button>
<pre><code id="code-block" class=".env">

APP_NAME="AI Chatbot"
APP_ENV=local
APP_KEY=<generated-key>
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_learning_bot
DB_USERNAME=root
DB_PASSWORD=<your-password>
</code></pre>
9. Run php artisan migrate to run the database migrations and create the necessary tables.
10. Seed the database with the necessary data entries by running php artisan db:seed.
11. Start the development server with the command php artisan serve. The chatbot can now be accessed at http://localhost:8000.

Note: Be sure to replace <your-username> and <your-password> with your actual MySQL credentials.
<!-- Initialize the clipboard.js library -->
<script>
    var clipboard = new ClipboardJS('.btn');
</script>
