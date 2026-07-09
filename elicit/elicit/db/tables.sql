CREATE TABLE `events` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `code` VARCHAR(50) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` VARCHAR(20),
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts`(`identification`)
);

CREATE TABLE `polls` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` VARCHAR(20),
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts`(`identification`)
);

INSERT INTO `polls` (name, description, created_by)
VALUES
('Audience Q&A', 'Let participants submit questions and vote for their favorites.', 'T202403723N'),
('Multiple choice', 'Ask participants to choose from a list of answers.', 'T202403723N'),
('Word cloud', 'Visualize the most popular responses as a cloud of words.', 'T202403723N'),
('Open text', 'Ask participants to answer in their own words.', 'T202403723N'),
('Ranking', 'Ask participants to rank a list of options in their preferred order.', 'T202403723N'),
('Rating', 'Let participants submit their rating on a scale you set.', 'T202403723N'),
('Quiz', 'Run a fun quiz with leaderboard at the end.', 'T202403723N'),
('Survey', 'Collect feedback from participants with a survey.', 'T202403723N');

CREATE TABLE `sessions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT(11) NOT NULL,
  `poll_type` VARCHAR(50) NOT NULL,
  `poll_id` INT(11) NULL,
  `is_open` TINYINT(1) DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE
);


CREATE TABLE `audience_qa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT(11) NOT NULL,
  `text` MEDIUMTEXT NOT NULL,
  `is_anonymous` TINYINT(1) DEFAULT 0,
  `is_highlighted` TINYINT(1) DEFAULT 0,
  `is_answered` TINYINT(1) DEFAULT 0,
  `likes` INT(11) DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` VARCHAR(20),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts`(`identification`)
);

CREATE TABLE `audience_qa_likes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `identification` VARCHAR(20) NOT NULL,
  `question_id` INT(11) NOT NULL,
  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `unique_user_question` (`identification`, `question_id`),
  FOREIGN KEY (`question_id`) REFERENCES `audience_qa`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `rating_polls` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT(11) NOT NULL,
  `question` MEDIUMTEXT,
  `min_rating` INT(11) DEFAULT 1,
  `max_rating` INT(11) DEFAULT 5,
  `rating_type` ENUM('stars', 'emojis') DEFAULT 'stars',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` VARCHAR(20),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts`(`identification`)
);

CREATE TABLE `rating_responses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `poll_id` INT(11) NOT NULL,
  `rating` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  FOREIGN KEY (`poll_id`) REFERENCES `rating_polls`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`)
);

CREATE TABLE `open_text_polls` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT(11) NOT NULL,
  `question` MEDIUMTEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` VARCHAR(20),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts`(`identification`)
);

CREATE TABLE `open_text_responses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `poll_id` INT(11) NOT NULL,
  `response` MEDIUMTEXT,
  `is_anonymous` TINYINT(1) DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  FOREIGN KEY (`poll_id`) REFERENCES `open_text_polls`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`)
);


CREATE TABLE `multiple_choice_polls` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT(11),
  `question` MEDIUMTEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` VARCHAR(20),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts`(`identification`)
);

CREATE TABLE `multiple_choice_options` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `poll_id` INT(11) NOT NULL,
  `option` MEDIUMTEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`poll_id`) REFERENCES `multiple_choice_polls`(`id`) ON DELETE CASCADE
);

CREATE TABLE `multiple_choice_responses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `poll_id` INT(11) NOT NULL,
  `option_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  FOREIGN KEY (`poll_id`) REFERENCES `multiple_choice_polls`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`option_id`) REFERENCES `multiple_choice_options`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  UNIQUE KEY `unique_user_vote` (`poll_id`, `created_by`)
);

CREATE TABLE `ranking_polls` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT(11),
  `question` MEDIUMTEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` VARCHAR(20),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts`(`identification`)
);

CREATE TABLE `ranking_options` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `poll_id` INT(11) NOT NULL,
  `option` MEDIUMTEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`poll_id`) REFERENCES `ranking_polls`(`id`) ON DELETE CASCADE
);

CREATE TABLE `ranking_responses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `poll_id` INT(11) NOT NULL,
  `option_id` INT(11) NOT NULL,
  `rank` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  FOREIGN KEY (`poll_id`) REFERENCES `ranking_polls`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`option_id`) REFERENCES `ranking_options`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  UNIQUE KEY `unique_user_vote` (`poll_id`, `option_id`, `created_by`)
);

CREATE TABLE `word_cloud_polls` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT(11) NOT NULL,
  `question` MEDIUMTEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` VARCHAR(20),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`),
  FOREIGN KEY (`updated_by`) REFERENCES `edith`.`accounts`(`identification`)
);

CREATE TABLE `word_cloud_responses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `poll_id` INT(11) NOT NULL,
  `response` MEDIUMTEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20),
  FOREIGN KEY (`poll_id`) REFERENCES `word_cloud_polls`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `edith`.`accounts`(`identification`)
);

CREATE TABLE `event_attendees` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `event_id` INT(11) NOT NULL,
  `identification` VARCHAR(20) NOT NULL,
  `first_seen` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `unique_event_attendee` (`event_id`, `identification`),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`identification`) REFERENCES `edith`.`accounts`(`identification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE VIEW events_sorted_view AS
SELECT *
FROM events
ORDER BY
  CASE
    WHEN CURDATE() BETWEEN start_date AND end_date THEN 1
    WHEN start_date > CURDATE() THEN 2
    ELSE 3
  END,
  CASE
    WHEN CURDATE() BETWEEN start_date AND end_date THEN UNIX_TIMESTAMP(start_date)
    WHEN start_date > CURDATE() THEN UNIX_TIMESTAMP(start_date)
    ELSE -UNIX_TIMESTAMP(end_date)
  END;