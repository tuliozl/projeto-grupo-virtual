-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- Dump data of "customer" ---------------------------------
BEGIN;

INSERT INTO `customer`(`id`,`name`,`email`,`password`,`created_at`,`deleted_at`,`updated_at`) VALUES 
( '1', 'Teste Cliente', 'teste@cliente.com', '123456', '2024-09-13 19:10:01', NULL, NULL ),
( '3', 'Cliente 2', 'cliente@w.com', 'senhaEdiitada', '2024-09-13 19:12:20', NULL, '2024-09-15 13:56:27' );
COMMIT;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


-- Dump data of "company" ----------------------------------
BEGIN;

INSERT INTO `company`(`id`,`name`,`cnpj`,`image`,`created_at`,`updated_at`,`deleted_at`) VALUES 
( '1', 'Empresa 1', '37462300000100', 'uploads/2465865686_385d33a820.jpg', '2024-09-15 14:24:13', NULL, NULL ),
( '2', 'Empresa 2', '03650520000138', 'uploads/3861712335_721f84d231.png', '2024-09-15 14:24:36', NULL, NULL ),
( '3', 'teste', '123', NULL, '2024-09-15 14:54:34', NULL, '2024-09-15 19:09:43' );
COMMIT;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


