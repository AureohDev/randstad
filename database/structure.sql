CREATE DATABASE randstad_compet;

USE randstad_compet;

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  avatar_path VARCHAR(255) DEFAULT NULL,
  is_connected TINYINT(1) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE messages (
    id INT NOT NULL AUTO_INCREMENT,
    user_sender_id INT NOT NULL,
    user_receiver_id INT NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT(1) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_MESSAGE_SENDER_USERS FOREIGN KEY (user_sender_id) REFERENCES users(id),
    CONSTRAINT FK_MESSAGE_RECEIVER_USERS FOREIGN KEY (user_receiver_id) REFERENCES users(id)
)

CREATE TABLE coaches (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    PRIMARY KEY (id)  
)

CREATE TABLE companies (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    logo_path VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE recruiters (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    company_id INT NOT NULL,
    phone_number VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE jobs (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    company_id INT NOT NULL,
    date_posted DATETIME NOT NULL,
    date_posted_tmstp BIGINT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_JOBS_COMPANIES FOREIGN KEY (company_id) REFERENCES companies(id)
)

CREATE TABLE job_applications (
    id INT NOT NULL AUTO_INCREMENT,
    job_id INT NOT NULL,
    user_id INT NOT NULL,
    is_applied TINYINT(1) NOT NULL,
    date_applied DATETIME NOT NULL,
    date_applied_tmstp BIGINT NOT NULL,
    is_consulted TINYINT(1) NOT NULL,
    date_consulted DATETIME DEFAULT NULL,
    date_consulted_tmstp BIGINT DEFAULT NULL,
    is_accepted TINYINT(1) NOT NULL,
    date_accepted DATETIME DEFAULT NULL,
    date_accepted_tmstp BIGINT DEFAULT NULL,
    is_try_period TINYINT(1) NOT NULL,
    date_try_period DATETIME DEFAULT NULL,
    date_try_period_tmstp BIGINT DEFAULT NULL,
    is_in_progress TINYINT(1) NOT NULL,
    date_in_progress DATETIME DEFAULT NULL,
    date_in_progress_tmstp BIGINT DEFAULT NULL,
    is_finished TINYINT(1) NOT NULL,
    date_finished DATETIME DEFAULT NULL,
    date_finished_tmstp BIGINT DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_JOB_APPLICATIONS_JOBS FOREIGN KEY (job_id) REFERENCES jobs(id),
    CONSTRAINT FK_JOB_APPLICATIONS_USERS FOREIGN KEY (user_id) REFERENCES users(id)
)

CREATE TABLE job_saves (
    id INT NOT NULL AUTO_INCREMENT,
    job_id INT NOT NULL,
    user_id INT NOT NULL,
    date_saved DATETIME NOT NULL,
    date_saved_tmstp BIGINT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_JOB_SAVES_JOBS FOREIGN KEY (job_id) REFERENCES jobs(id),
    CONSTRAINT FK_JOB_SAVES_USERS FOREIGN KEY (user_id) REFERENCES users(id)
)

CREATE TABLE improvments (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE user_improvments (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    improvment_id INT NOT NULL,
    is_started TINYINT(1) NOT NULL,
    is_completed TINYINT(1) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_USER_IMPROVMENTS_USERS FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_USER_IMPROVMENTS_IMPROVMENTS FOREIGN KEY (improvment_id) REFERENCES improvments(id)
)

CREATE TABLE contact_requests (
    id INT NOT NULL AUTO_INCREMENT,
    user_sender_id INT NOT NULL,
    user_receiver_id INT NOT NULL,
    date_sent DATETIME NOT NULL,
    date_sent_tmstp BIGINT NOT NULL,
    is_remote TINYINT(1) NOT NULL,
    is_agency TINYINT(1) NOT NULL,
    is_phone TINYINT(1) NOT NULL,
    is_done TINYINT(1) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_CONTACT_REQUESTS_SENDER_USERS FOREIGN KEY (user_sender_id) REFERENCES users(id),
    CONSTRAINT FK_CONTACT_REQUESTS_RECEIVER_USERS FOREIGN KEY (user_receiver_id) REFERENCES users(id)
)

CREATE TABLE jobs_suggestions (
    id INT NOT NULL AUTO_INCREMENT,
    job_id INT NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (id)
)

