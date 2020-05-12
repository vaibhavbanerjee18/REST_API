CREATE TABLE `studentinfo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `age` INT(3),
  `std` INT(3),
  PRIMARY KEY (`id`)
);

INSERT INTO `studentinfo` (`name`, `age`,`std`) VALUES
('vaibhav',23,12),
('suraj',20,11),
('apoorva',14,10),
('swapnil',41,9);
