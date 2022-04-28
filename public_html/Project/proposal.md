# Project Name: Simple Arcade
## Project Summary: This project will create a simple Arcade with scoreboards and competitions based on the implemented game.
## Github Link: https://github.com/nekozye/IT202-010/tree/prod
## Project Board Link: 
## Website Link: https://jc865-prod.herokuapp.com/Project/index.html
## Your Name:Jonghyun Choi

<!-- Line item / Feature template (use this for each bullet point) -- DO NOT DELETE THIS SECTION


- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  Link to related .md file: [Link Name](link url)

 End Line item / Feature Template -- DO NOT DELETE THIS SECTION --> 
 
 
### Proposal Checklist and Evidence

- Milestone 1
  - [x] \(04/03/2022 of completion) \(04/03/2022 of completion) User will be able to register a new account
  -  Link to related .md file:<a href="https://jc865-prod.herokuapp.com/Project/register.php">
  Link</a>
    - [x] \(04/03/2022 of completion)\(04/03/2022 of completion) Form Fields
      - [x] \(04/03/2022 of completion)\(04/03/2022 of completion) Username, email, password, confirm password
      - [x] \(04/03/2022 of completion)\(04/03/2022 of completion) Email is required and must be validated
      - [x] \(04/03/2022 of completion) Username is required
      - [x] \(04/03/2022 of completion) Confirm password's match
    - [x] \(04/03/2022 of completion) Users Table
      - [x] \(04/03/2022 of completion) ID, username, email, password (60 characters), created, modified   
    - [x] \(04/03/2022 of completion) Password must be hashed (plain text passwords will lose points)
    - [x] \(04/03/2022 of completion) Email should be unique
    - [x] \(04/03/2022 of completion) Username should be unique
    - [x] \(04/03/2022 of completion) System should let user know if username or email is taken and allow the user to correct the error without wiping/clearing the form
      - [x] \(04/03/2022 of completion) The only fields that may be cleared are the password fields 

  - [x] \(04/03/2022 of completion) User will be able to login to their account (given they enter the correct credentials)
  -  Link to related .md file:<a href="https://jc865-prod.herokuapp.com/Project/login.php">Link</a>
    - [x] \(04/03/2022 of completion) Form
      - [x] \(04/03/2022 of completion) User can login with email or username
        - [x] \(04/03/2022 of completion) This can be done as a single field or as two separate fields
      - [x] \(04/03/2022 of completion) Password is required
    - [x] \(04/03/2022 of completion) User should see friendly error messages when an account either doesn’t exist or if passwords don’t match
    - [x] \(04/03/2022 of completion) Logging in should fetch the user’s details (and roles) and save them into the session.
    - [x] \(04/03/2022 of completion) User will be directed to a landing page upon login
      - [x] \(04/03/2022 of completion) This is a protected page (non-logged in users shouldn’t have access)
      - [x] \(04/03/2022 of completion) This can be home, profile, a dashboard, etc

  - [x] \(04/03/2022 of completion) User will be able to logout
  -  Link to related .md file:<a href="https://jc865-prod.herokuapp.com/Project/logout.php">Link</a>
      - [x] \(04/03/2022 of completion) Logging out will redirect to login page
      - [x] \(04/03/2022 of completion) User should see a message that they’ve successfully logged out
      - [x] \(04/03/2022 of completion) Session should be destroyed (so the back button doesn’t allow them access back in)
      
  - [x] \(04/03/2022 of completion) Basic security rules implemented
      - [x] \(04/03/2022 of completion) Authentication:
          - [x] \(04/03/2022 of completion) Function to check if user is logged in
          - [x] \(04/03/2022 of completion) Function should be called on appropriate pages that only allow logged in users
      - [x] \(04/03/2022 of completion) Roles/Authorization:
          - [x] \(04/03/2022 of completion) Have a roles table (see below)

  - [x] \(04/03/2022 of completion) Basic Roles implemented
      - [x] \(04/03/2022 of completion) Have a <span style="text-decoration:underline;">Roles</span> table  (id, name, description, is_active, modified, created)
      - [x] \(04/03/2022 of completion) Have a <span style="text-decoration:underline;">User Roles</span> table (id, user_id, role_id, is_active, created, modified)
      - [x] \(04/03/2022 of completion) Include a function to check if a user has a specific role (we won’t use it for this milestone but it should be usable in the future)

  - [x] \(04/03/2022 of completion) Site should have basic styles/theme applied; everything should be styled
      - [x] \(04/03/2022 of completion) I.e., forms/input, navigation bar, etc

  - [x] \(04/03/2022 of completion) Any output messages/errors should be “user friendly”
      - [x] \(04/03/2022 of completion) Any technical errors or debug output displayed will result in a loss of points

  - [x] \(04/03/2022 of completion) User will be able to see their profile
  -  Link to related .md file:<a href="https://jc865-prod.herokuapp.com/Project/profile.php">Link</a>
      - [x] \(04/03/2022 of completion) Email, username, etc
      
  - [x] User will be able to edit their profile
  -  Link to related .md file:<a href="https://jc865-prod.herokuapp.com/Project/profile.php">Link</a>
      - [x] Changing username/email should properly check to see if it’s available before allowing the change
      - [x] Any other fields should be properly validated
      - [x] Allow password reset (only if the existing correct password is provided)
          - [x] Hint: logic for the password check would be similar to login

- Milestone 2
<br>
<a href="https://jc865-prod.herokuapp.com/Project/index.php">Link</a>
  - [x] \(04/06/2022 of completion) Pick a simple game to implement, anything that generates a score that’s more advanced than a simple random number generator (may build off of a sample from the site shared in class for the HTML5 HW)
    - [x] What game will you be doing?
        * **Simple Shoot'em up Game**
    - [x] Briefly describe it.
        * **Originally side scroller game that is developed as a canvas game for html.**
    * **Note**: For this milestone the game doesn’t need to be complete, just have something basic or a placeholder that can generate a score when played.
  - [x] \(04/13/2022 of completion) The system will save the user’s score at the end of the game only if the user is logged in
      - [x] There should be a <span style="text-decoration:underline;">Scores</span> table (id, user_id, score, created, modified)
      - [x] Each received score should be a new entry (scores will not be updated)
          - [x] Please let me know if your project expects a running total score
  - [x] \(04/13/2022 of completion) The user will be able to see their last 10 scores
      - [x] Shown on their profile page
      - [x] Ordered by most recent
  - [x] \(04/13/2022 of completion) Create function(s) that output the following scoreboards
      - [x] Top 10 Weekly
      - [x] Top 10 Monthly
      - [x] Top 10 Lifetime
      - [x] Scoreboards should show no more than 10 results; if there are no results a proper message should be displayed (i.e., “No [time period] scores to display”)
  - [x] \(04/15/2022 of completion)Create a Homepage (index.php)
      - [x] Include a weekly, monthly, and lifetime scoreboard
          - [x] Scoreboards will show username, score, timestamp of when the score was received
          - [x] You may manually edit some score entries in the database to show proof each scoreboard output works
      - [x] Include a link to the game
      - [x] Include a description of your project/game
      - [x] Include a proper heading
- Milestone 3
  - (duplicate template here for Milestone 1 features)
- Milestone 4
  - (duplicate template here for Milestone 1 features)
  - 
### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file per the template
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone# branch as the source to branch from and to merge into)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented (these will be used to populate the related .md files for each milestone, forgetting to capture this will give you more work later on)
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this branch is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] \(mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed (be sure it doesn't break anything in prod)
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project board