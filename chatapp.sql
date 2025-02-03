

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `sendImg` VARCHAR(255),
  `sendVideo` VARCHAR(255),
  `Senddocument` VARCHAR(255)
) 


CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) 

ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;




CREATE TABLE message_requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sender_id INT NOT NULL,
  receiver_id INT NOT NULL,
  status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE (sender_id, receiver_id)
);
CREATE TABLE feedback (
  id INT(255) AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(255),
  lname VARCHAR(255),
  email VARCHAR(255),
  message VARCHAR(1000)
);

CREATE TABLE `messages` (
  `msg_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `incoming_msg_id` INT(11) NOT NULL,
  `outgoing_msg_id` INT(11) NOT NULL,
  `msg` VARCHAR(1000) NOT NULL
);
CREATE TABLE `media` (
  `media_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `msg_id` INT(11) NOT NULL,
  `media_type` ENUM('image', 'video', 'document') NOT NULL,
  `media_path` VARCHAR(255) NOT NULL,
  FOREIGN KEY (`msg_id`) REFERENCES `messages`(`msg_id`) ON DELETE CASCADE
);
