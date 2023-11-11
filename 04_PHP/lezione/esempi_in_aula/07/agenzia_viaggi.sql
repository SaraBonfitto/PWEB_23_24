
create Database `agenzia_viaggi`;

use `agenzia_viaggi`;

CREATE TABLE `pullman` (
  `id_pullman` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modello` varchar(30) NOT NULL,
  `capienza` enum('20','40','60') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `pullman` (`id_pullman`, `marca`, `modello`, `capienza`) VALUES
(8, 'nuovo', 'nuovo', '20'),
(9, 'modello', 'miomd', '20'),
(10, 'aaaa', 'bbbbb', '60');

ALTER TABLE `pullman`
  ADD PRIMARY KEY (`id_pullman`);

ALTER TABLE `pullman`
  MODIFY `id_pullman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
