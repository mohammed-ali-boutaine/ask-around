# AskAround

AskAround is a Q&A platform where users can ask and answer questions related to specific cities or locations.

## Features

### Authentication

-   User registration with username, email, and password
-   User login/logout functionality
-   Profile management with customizable profile picture

### Questions

-   Create questions with title, content, and city
-   Browse questions with search functionality
    -   Filter by keywords
    -   Filter by city
-   Edit and delete own questions
-   Save questions for later reference
-   View question details including:
    -   Author information
    -   Creation date
    -   Location (city)
    -   Responses

### Responses

-   Add responses to questions
-   View all responses for a question
-   Responses show author and timestamp

### User Dashboard

-   View personal questions
-   Access saved questions
-   Manage profile settings

## Technical Stack

### Backend

-   PHP Laravel Framework
-   SQLite Database
-   Authentication middleware
-   Route protection
-   File upload handling (for profile pictures)

### Database Structure

-   Users table: username, email, password, picture
-   Questions table: title, content, ville (city), user_id
-   Responses table: content, user_id, question_id
-   Saved_questions table: user_id, question_id (pivot table)

### Frontend

-   Blade templating engine
-   Tailwind CSS for styling
-   Responsive design
-   Dark theme with white/transparent components

## Security Features

-   Password hashing
-   CSRF protection
-   Authorization checks for editing/deleting content
-   Protected routes requiring authentication
-   Owner-only access for editing questions

## Routes

```php
// Authentication
POST /register              // User registration
POST /login                // User login
POST /logout               // User logout

// Dashboard & Profile
GET  /dashboard            // Main dashboard
GET  /profile             // View profile
PUT  /profile             // Update profile
POST /profile/picture     // Update profile picture

// Questions
GET    /questions         // List questions
POST   /questions         // Create question
GET    /questions/{id}    // View question
PUT    /questions/{id}    // Update question
DELETE /questions/{id}    // Delete question
POST   /questions/{id}/save // Save/unsave question

// Responses
GET  /questions/{id}/responses    // View responses
POST /questions/{id}/responses    // Add response
```
