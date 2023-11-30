CREATE TABLE `facturas` (
  `fecha` date NOT NULL,
  `numero` int(4) UNSIGNED ZEROFILL NOT NULL,
  `cliente` varchar(80) NOT NULL,
  `cobro` varchar(30) NOT NULL,
  `cif` varchar(9) NOT NULL,
  `vencimiento` date NOT NULL,
  `importe` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `facturas` (`fecha`, `numero`, `cliente`, `cobro`, `cif`, `vencimiento`, `importe`) VALUES
('2023-08-31', 0001, 'Paco Carballo Castro', '30 días', 'B11111111', '2023-09-30', 500.75);

ALTER TABLE `facturas`
  ADD PRIMARY KEY (`numero`);