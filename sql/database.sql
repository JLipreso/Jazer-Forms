

CREATE TABLE `forms` (
  `dataid` int(10) NOT NULL,
  `project_refid` varchar(26) DEFAULT NULL,
  `form_refid` varchar(26) DEFAULT NULL,
  `form_name` varchar(32) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `forms_submissions` (
  `dataid` int(10) NOT NULL,
  `project_refid` varchar(26) DEFAULT NULL,
  `form_refid` varchar(26) DEFAULT NULL,
  `form_submission_refid` varchar(26) DEFAULT NULL,
  `title` varchar(220) DEFAULT NULL,
  `forms_data` text DEFAULT NULL,
  `creator_refid` varchar(26) DEFAULT NULL,
  `creator_name` varchar(120) DEFAULT NULL,
  `creator_email` varchar(120) DEFAULT NULL,
  `created_by` varchar(26) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `seen` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('new','onreview','declined','done','archive') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `forms_submissions_seen` (
  `dataid` int(10) NOT NULL,
  `project_refid` varchar(26) DEFAULT NULL,
  `form_submission_refid` varchar(26) DEFAULT NULL,
  `seen_by` varchar(26) DEFAULT NULL,
  `seen_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `forms`
  ADD PRIMARY KEY (`dataid`);

ALTER TABLE `forms_submissions`
  ADD PRIMARY KEY (`dataid`),
  ADD UNIQUE KEY `form_submission_refid` (`form_submission_refid`);

ALTER TABLE `forms_submissions_seen`
  ADD PRIMARY KEY (`dataid`);

ALTER TABLE `forms_submissions`
  MODIFY `dataid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `forms_submissions_seen`
  MODIFY `dataid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
