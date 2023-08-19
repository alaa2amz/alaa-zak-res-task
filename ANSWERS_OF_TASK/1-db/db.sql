/*Alaa Zakariya
 	answer to db-1
 */

CREATE DATABASE softdelete;
USE DATABASE softdelete;
CREATE TABLE deleted_users(
	id INT PRIMARY KEY AUTO_INCREMENTE,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	image_path VARCHAR(256),
	original_id INT
);

/*
* original id is to be used to
* restore deleted user in its place
* since auto increment only uses
* always new numbers not empty ones
* in between unless reached overflow
* limit which it is unlikely
* so you can reinsert deleted user
* in the same old id in main users table.
*/

