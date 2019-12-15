CREATE TABLE IF NOT EXISTS `tbl_country` (
`id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
)

INSERT INTO `tbl_country` (`id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Bahamas'),
(4, 'Bahrain'),
(5, 'Cambodia'),
(6, 'Cameroon'),
(7, 'Denmark'),
(8, 'Djibouti'),
(9, 'East Timor'),
(10, 'Ecuador'),
(11, 'Falkland Islands (Malvinas)'),
(12, 'Faroe Islands'),
(13, 'Gabon'),
(14, 'Gambia'),
(15, 'Haiti'),
(16, 'Heard and Mc Donald Islands'),
(17, 'Iceland'),
(18, 'India'),
(19, 'Jamaica'),
(20, 'Japan'),
(21, 'Kenya'),
(22, 'Kiribati'),
(23, 'Lao People''s Democratic Republic'),
(24, 'Latvia'),
(25, 'Macau'),
(26, 'Macedonia'),
(27, 'Namibia'),
(28, 'Nauru'),
(29, 'Oman'),
(30, 'Pakistan'),
(31, 'Palau'),
(32, 'Qatar'),
(33, 'Reunion'),
(34, 'Romania'),
(35, 'Saint Kitts and Nevis'),
(36, 'Saint Lucia'),
(37, 'Taiwan'),
(38, 'Tajikistan'),
(39, 'Uganda'),
(40, 'Ukraine'),
(41, 'Vanuatu'),
(42, 'Vatican City State'),
(43, 'Wallis and Futuna Islands'),
(44, 'Western Sahara'),
(45, 'Yemen'),
(46, 'Yugoslavia'),
(47, 'Zaire'),
(48, 'Zambia');

ALTER TABLE `tbl_country_name`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_country_name`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;