# PHP groupwork project
**Deadline** examination day - please attend the same day with all group members

## Instructions
1. One group member forks this repository and shares with other team members
2. Make a pull request
3. Edit the README.md file accordingly
4. Create web application

### Requirements

1. **README.md contains:**
    * name of the project
    * names of the teammember
    * purpose of the project (3-4 sentences what problem you are trying to solve);
    * description of the project (target group – your customers/clients, how you differ from other apps – describe 2-3 similar applications/web services);
    * functionalities of the app
        * v0.1 It is possible to create user
        * v0.2 User can add his/her interests
        * ...
    * **summary:** what did you learn? what did fail? what whould you do different next time?


2. **Web application/service requirements:**
    * add separate file where you describe your DB table (you can export them from phpMyAdmin)
    * You are using atleast 3 tables;
    * code is separated by files (you have config file, functions file etc.)
    * application has enough functionalities (you have solved all the issues)
    * it is possible to see what wach team member has developed 

	
	App name: HUNT ME
	Teammates: Marika Vinkmann, Dmitry Brezhnev
	
	Purpose of the project: this is an app that is used for playing Alternate Reality Games (ARGs). Two teams each have a username and password.
	Each team is connected to their own DB, which contains all possible codes for according team. 
	
	If team 1 inserts code 1 which matches their DB, their DB
	connects to a table of clues for team 1 and checking IDs sends back a corresponding clue for team 1.
	
	But if team 2 inserts code 1, it doesn't match their DB, so their DB instead of connecting to table of clues for team 2,
	connects to a mutual table of fake clues, and fake clue is chosen randomly from the list and is sent to team 2.
	
	Guided by a fake clue team 2 arrives to a phisycal location where they find a text that says "It's a trap, go back to a previous location and insert a correct code."
	Table of fake clues is the same for both teams.
	
	
	
	
	
	
	
	
	
	
	
	