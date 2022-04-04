<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Jong Hyun Choi(jc865)</td></tr>
<tr><td> <em>Generated: </em> 4/3/2022 8:22:58 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone1-deliverable/grade/jc865" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone1 branch</li>
<li>Create a milestone1.md file in your Project folder</li>
<li>Git add/commit/push this empty file to Milestone1 (you&#39;ll need the link later) </li>
<li>Fill in the deliverable items<ol>
<li>For the proposal.md file use the direct link to milestone1.md from the Milestone1 branch for all of the features  </li>
<li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e, <a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li>
</ol>
</li>
<li>Ensure your images display correctly in the sample markdown at the bottom</li>
<li>Save the submission items</li>
<li>Copy/paste the markdown from the &quot;Copy markdown to clipboard link&quot;</li>
<li>Paste the code into the milestone1.md file</li>
<li>Git add/commit/push the md file to Milestone1</li>
<li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li>
<li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Make a pull request from dev to prod (resolve any conflicts) <ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/register/register-blank.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>basic registration page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/register/newcreatedfakeaftersubmitregister.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>After Successful registration<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/register/confirmpasswordmatchregister.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>On One of the errors<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/register/databasebeforeregister.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>database before registration<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/register/databaseafterregister.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>database after registration<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/12">https://github.com/nekozye/IT202-010/pull/12</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/13">https://github.com/nekozye/IT202-010/pull/13</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The registration page database updates new users when both php serverside and client<br>javaside has been met on validation. it returns to login page once registration<br>is complete and validated.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/login/login_base_form.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Basic Page View<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/login/successfull_login.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successfull Login<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/login/password_required.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password Empty Error Message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/login/unmatching_email.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Non-Matching Email<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/login/unmatching_password.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Non-matching password based on email<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/login/successfull_login.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successfull Login, Showing Home Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/35">https://github.com/nekozye/IT202-010/pull/35</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The login page is a simplified version of the register page, where instead<br>of making a new row of data it &quot;validates&quot; it by matching the<br>hashed data.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/logout/after_logout.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Logout Message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/logout/after_back_button_session_destroyed.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Outputs this message when trying to access the previous page using back button<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/35">https://github.com/nekozye/IT202-010/pull/35</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Logout button just destroys the session and reverts back to login page.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/roles/admin_access_page_error.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Both Subtask 1 and 2 shows both inaccessable admin page, and relocated back<br>to login.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page (a test/dummy page is fine)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/roles/admin_access_page_error.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Both Subtask 1 and 2 shows both inaccessable admin page, and relocated back<br>to login.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/roles/database_table_roles.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>database data for table role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/roles/database_table_usrroles.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>database data for table userroles<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/38">https://github.com/nekozye/IT202-010/pull/38</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Login Protected page is connected to navigation, therefore no matter which page it<br>is on, as long as navigation bar is online, it checks the current<br>session of the user.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>For role protected page, similar effect is done for login page but it<br>also checks the current role of the session. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/login/login_base_form.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>The style theme is a theme developed for CS 490, and i modified<br>it to fit the current html file setups.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/38">https://github.com/nekozye/IT202-010/pull/38</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>Navigation bar - html was edited slightly with php echo to return if<br>the current page matches the navigation bar element. it adds class based on<br>the result.<br>the class that was applied in above mentioned things colors the navigation<br>bar green.<br>rest is gray with white island floating forms themed.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/login/password_required.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>login error page message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/38">https://github.com/nekozye/IT202-010/pull/38</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>all outputs are &quot;flash&quot; and follows the typicall error messages that users who<br>is familiar with error messages on internet sites can recognize.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/profilepage/see_profile.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>profile page!<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/35">https://github.com/nekozye/IT202-010/pull/35</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>the input of username and email is filled when returning the current page.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/profilepage/password_and_confirm_mismatch.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>this message is displayed when password and confirm is mismatched.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/profilepage/missing_current_password.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>this message is displayed when current password is not filled<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/profilepage/already_used_username.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>this message is displayed when username is already used. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/profilepage/already_used_email.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>this message is displayed when email is invalid, or already used.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/profilepage/before_modification_database.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>database before mod<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/profilepage/after_modification_database.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>database after mod<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/38">https://github.com/nekozye/IT202-010/pull/38</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>profile page has two sections. one is the username/email part and another is<br>password part.<br>since this page is login protected, i have eliminated the need of<br>a password when changing email.</p><br><p>two error messages are displayed in separatly.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Proposal and Issues </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/proposal_capture.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>saddly, all of the dump was made at once. (project time management failure)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone1/pictures/Project/issue_tracker_capture.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>all the issues are complete.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone1-deliverable/grade/jc865" target="_blank">Grading</a></td></tr></table>