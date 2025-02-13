MAIN FEATURES:
Tutors  enable  to  perform self-registration as users, update bio, profile picture
Tutors enable to post tuition details, and edit or modify the postings
Students can view postings according to the latest posting, tutor, and subjects. 
The posting may also include a picture of the tutor with their current students for the particular subject.

DATABASE STRUCTURE:
There are 5 tables: users, tutors, subjects, tutoringsessions and postings.
Relationship as below:		
users 1 to 1 tutor
tutors	1 to many posting
tutors	1 to many tutoringsession
tutoringsessions	1 to many posting
subjects	1 to many tutoringsession

DATABASE SEEDER:
6 Database Seeder:
UserSeeder, TutorSeeder, SubjectSeeder, TutoringSessionsSeeder and postingsSeeder.
DatabaseSeeder to Compile all related seeder.




