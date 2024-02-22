DROP DATABASE notas;
create DATABASE notas;
use notas;
CREATE TABLE `notas` (
  `id` int(1) NOT NULL,
  `nombre` text NOT NULL,
  `nota1` int(11) NOT NULL,
  `nota2` int(11) NOT NULL,
  `nota3` int(11) NOT NULL,
  `nota4` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `promedio` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
INSERT INTO `notas` (`id`, `nombre`, `nota1`, `nota2`, `nota3`, `nota4`, `fecha`, `promedio`) VALUES
(34, 'diego', 4, 5, 6, 4, '2024-02-22 14:34:21', 4.75);
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

