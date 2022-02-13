CREATE TABLE `md_service` (
  `id` int(10) NOT NULL,
  `company_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `asset_desc` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `md_service` (`id`, `company_code`, `name`, `asset_desc`, `image`, `create_date`, `update_date`) VALUES
(1, 'test', 'test', 'test', '1644772625_7733.jpg', '2022-02-13 17:17:05', '2022-02-13 18:03:51'),
(2, 'test Company Code', 'test name', 'test Asset Desc', '1644775453_2017.jpg', '2022-02-13 18:04:13', NULL);

ALTER TABLE `md_service`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `md_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;