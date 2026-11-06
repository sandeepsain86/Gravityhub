CREATE DATABASE IF NOT EXISTS energyhub
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE energyhub;

CREATE TABLE IF NOT EXISTS contact_messages (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(254) NOT NULL,
  phone VARCHAR(40) NULL,
  subject VARCHAR(200) NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_contact_messages_created_at (created_at)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS service_requests (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  customer_name VARCHAR(150) NOT NULL,
  phone VARCHAR(40) NOT NULL,
  email VARCHAR(254) NOT NULL,
  service_type VARCHAR(60) NOT NULL,
  equipment_type VARCHAR(200) NULL,
  device_model VARCHAR(200) NULL,
  site_location VARCHAR(255) NULL,
  material_needs VARCHAR(10) NULL,
  issue_description TEXT NOT NULL,
  contact_method VARCHAR(20) NOT NULL,
  preferred_time VARCHAR(150) NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_service_requests_created_at (created_at),
  KEY idx_service_requests_service_type (service_type)
) ENGINE=InnoDB;
