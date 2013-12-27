## <ShareDoc> System Requirements for ShareDoc
27.12.2013  

Team members
* Asim Ashraf
* Henrik Reponen
* Sebastian Rosenqvist
* Quentin de Lattre 

 
## 1. Introduction
 
For this class, we had an assignment to design and develop a CMS from the ground up. We didn’t want to go the classic way of designing a Wordpress style blog so we tried to come up with a smarter idea. Eventually, we decided to develop a collaborative online work platform where users can edit documents for themselves and share some more with group members. It would be some sort of bridge between Google Docs for real-time text editing and Dropbox for the principle of shared folders. 
 
## 2. Use cases
 
### 2.1 Definition of the user groups
We decided to agree on three levels of users : Basic users, that would be the general public and common users, Admin and finally a SuperAdmin for development purposes.

### 2.2 Use case diagrams

![Diagram](https://raw.github.com/henrikre/sharedoc/master/usercase.png "Use case diagram")

### 2.3 Use case scenarios

**”Visitor wants to register”**

Initial state:
Visitor is not registered

Normal flow:

 1. User goes to the site
 2. The visitor is prompted with the login page and the option to register
 3. Choosing register takes the visitor to the registration form
 4. A unique username, strong password and a valid email address have to be provided
 5. To finish registration visitor clicks submit
 6. The transaction is confirmed and the verification email is sent to the given email address which the user is told to verify first
 7. After the verification link is clicked the user account is fully functional

What can go wrong:
* username is not unique
* password is too weak
* email is mistyped
* problem with the system

End state:
User can now login

---

**"User wants to login"**

Initial state:
User is not logged in

Normal flow:
  
  1. User opens the site
  2. User sees the page with the username and password form and the "Login" button
  3. Then he/she enters the username and password and clicks "Login"
  4. The user is redirected to the start screen of the application and is now logged in
    
What can go wrong: 
  
* The user mistypes the username or password

Other activities going on at the same time: 
  
* Database checks the match with the username and password

End state:
The user is logged in.

---

**"User wants to log out"**

Initial state: 
User is logged in and on the main view

Normal flow:
  
  1. User sees the logout button and clicks it
  2. The user is redirected to the login page of the application and is now logged out

What can go wrong: 
  
* User has already been logged out due to inactivity

Other activities going on at the same time: 
  
* Database logs the user out from the account

End state:
The user is logged out

---

**"User wants to create a document"**

Initial state: 
User is logged in and on the main view

Normal flow:
  
  1. User clicks create new document button
  2. A new document is created in the current group (user's own documents) and the document view opens
  3. The name of the file is highlighted so the user can rename the document

What can go wrong: 
  
  * user doesn’t have priviledge to create a new document in the current group
  * user has exceeded his or hers document quota

Other activities going on at the same time: 
  
* A new entry is added to the database

End state: 
The user is in document view and can edit the created document

---

**"User wants to edit a document"**

Initial state: 
User is logged in and on the main view

Normal flow:
  
  1. User selects a document to edit
  2. The document view is shown and the document can be edited (if the user owns the document or has privilege to edit it)
  3. The user closes the document when edits are done

What can go wrong: 
  
  * user doesn’t have the right to edit the file
  * there’s a problem with the system

Other activities going on at the same time: 
  
* Every edit in the document triggers the changes to be saved in the database

End state: 
The user is in main view

---

**"User wants to delete a document"**

Initial state: 
User is logged in and on the main view

Normal flow:
  
  1. User selects the option to delete documents
  2. The document view is shown and the document can be edited (if the user owns the document or has privilege to edit it)
  3. The user closes the document when edits are done

What can go wrong: 
  
  * user doesn’t have the right to edit the file
  * there’s a problem with the system

Other activities going on at the same time: 
  
* Every edit in the document triggers the changes to be saved in the database

End state: 
The user is in main view

---

**"User wants to collaborate on a document"**

Initial state: 

  User is logged in and on the main page.

Normal flow:

 *Option 1 (the person to collaborate with is already a user of the system):*

  1. User chooses collaborate
  2. User is shown a list of users in the system with a text field for search and a option to invite people outside the system
  3. User types the username of the person to collaborate with and selects the correct user from the list and clicks submit
  5. The user is given the option to share an existing group or to create a new one to share with this person
  6. User selects a new group to be created for collaboration with this user
  7. The creation and sharing of the group is confirmed


  *Option 2 (the person to collaborate with is NOT a user of the system):*

  1. User chooses collaborate
  2. User is shown a list of users in the system with a text field for search and a option to invite people outside of the system
  3. User selects to invite and types an email address and submits it
  4. The user is given the option to share an existing group or to create a new one to share with this person
  5. User selects a new group to be created for collaboration with this user
  6. User is notified that the invitation was sent out successfully
      
What can go wrong:
 
* user might mistype the name and the person looked for is not shown on the list
* user mistypes email address
* invited user fails to confirm the invite

Other activities going on at the same time:

* when searching for a user, the database shows the results of usernames that include the typed characters
* when an invitation is sent a token is created in the database which self destructs if the account isn’t activated in time

End state: 
The user is invited to collaborate on the group and this group is shown to the invitor

---

**"User wants to create a group"**

Initial state: 
User is logged in and on the main view

Normal flow:
  
  1. User clicks create new group button
  2. A new group is created and the group view opens with settings for the created group
  3. Group has to be given a name and the user can specify who has access to view or edit the documents

What can go wrong: 
  
  * user doesn't specify a name
  * user mistypes a username

Other activities going on at the same time: 
  
* A new entry is added to the database

End state: 
User is in group view

---




Depiction of one use case as a flow chart
 

## 3. System architecture
 
### 3.1 High-level overview of the system
### 3.1 Main modules and their functions represented
 
## 4. Requirements

### 4.1 Functional requirements
* The system shall allow new users to register an account with a username, password and email address
* The system shall store user information including a username, password and email address
* The system shall validate the given email and make sure a strong password is provided during the registration process
* The system shall send a verification email after registration and initialize the account once the verification has been done or destroy the account if the user fails to do so
* The system shall display documents the user has access to
* The system shall make revisions of a document every time a change is made to it
* The system shall allow multiple users to edit the same document at the same time
* The system shall allow users to create and edit documents and groups
* The system shall allow users to share their documents with others and give them read-only or full access per user basis
* The system shall allow invites to collaborate be sent via email, if the sent link isn’t activated the invite gets destroyed
* The system shall allow users to delete their account

### 4.2 Non-functional requirements

Security

* access to documents is controlled by user
* user inputs will be sanitized
* passwords will be added a salt and hashed with SHA-256

Reliability

* document history is stored so the user can go back to a older version of the document if something goes wrong
* very reliable relational databases are used
* run on school servers which are well maintained

Usability

* simple intuitive design is used on the user interface
* users are given lots of feedback on errors or actions completed
 

## 5. User interface

**Login**
![ui image](https://raw.github.com/henrikre/sharedoc/master/ui/login.png "Login user interface")

This view of the application allows users to log into the system as the main focus. But also creation of new users can be reached from here.
Design elements include flat design with a clean color palette and minimalistic layout. The color palette has the document view in mind where a dark background keeps the focus on brighter elements.


**Main view**
![ui image](https://raw.github.com/henrikre/sharedoc/master/ui/main.png "Main view user interface")

This view depicts the main view on the documents with the page navigation on top together with user elements like username, avatar and link to user settings.
Documents are shown in an iconic view with a descriptive document title below the icon.


**Groups View**
![ui image](https://raw.github.com/henrikre/sharedoc/master/ui/groups.png "Groups view user interface")

This view shows the groups page with an iconic listing of groups a user belongs to. Essential the same as the documents view. 


**Document View**
![ui image](https://raw.github.com/henrikre/sharedoc/master/ui/doc.png "Document view user interface")

This is the main view for document editing.  As previously mention is the focus on the document and the dark color palette helps to keep the document in the foreground.

The right side of the page gives space for editorial elements like fonts and and font size. Later expansion of these elements can be achieved without problems.


## 6. Development process

