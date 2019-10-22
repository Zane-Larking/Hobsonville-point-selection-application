# Privileges for `select_insert`@`localhost`

GRANT SELECT, INSERT ON *.* TO 'select_insert'@'localhost' IDENTIFIED BY PASSWORD '*72088A23932E6B53BFE49EA89DEF253658DF0351';

GRANT SELECT, INSERT ON `hpss_classes`.* TO 'select_insert'@'localhost';


# Privileges for `selections_selec`@`localhost`

GRANT SELECT, INSERT ON *.* TO 'selections_selec'@'localhost' IDENTIFIED BY PASSWORD '*72088A23932E6B53BFE49EA89DEF253658DF0351';

GRANT ALL PRIVILEGES ON `hpss_classes`.* TO 'selections_selec'@'localhost';