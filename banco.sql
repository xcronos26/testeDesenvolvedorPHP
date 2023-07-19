
CREATE TABLE series_tv ( -- criando a tabela de series de tv
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100),
  canal VARCHAR(50),
  genero VARCHAR(50)
);

CREATE TABLE series_tv_intervalos ( -- criando o horario de exibição das tvs
  id_serie_tv INT,
  dia_da_semana VARCHAR(20),
  horario TIME,
  FOREIGN KEY (id_serie_tv) REFERENCES series_tv(id)
);

-- Inserção dos dados das séries
INSERT INTO series_tv (titulo, canal, genero) VALUES
('Como vencer na vida', 'NUVEMFLIX', 'Motivacional'),
('O beijo que eu te dei', 'MULTITELA', 'Romantico'),
('A vida de um TI no suporte', 'TI da gente', 'Comedia'),
('Emagrecer e preciso', 'Vida e Atividade', 'Autoajuda'),
('Papuda o ponto final', 'Realidades', 'Documentário'),
('Chegando la', 'Nuvemflix', 'dinheiro'),
('a industria do amanha', 'Multitela', 'digital'),
('amanha te conto', 'Ti da Gente', 'comedia'),
('fome mortal', 'VIDA E ATIVIDADE', 'DOCUMENTARIO'),
('CRIPTONS O DINHEIRO DO AMANHA', 'NUVEMFLIX2', 'CRIPTONS');

INSERT INTO series_tv_intervalos (id_serie_tv, dia_da_semana, horario) VALUES
(1, 'Segunda-feira', '20:00:00'),
(1, 'Quarta-feira', '21:30:00'),
(2, 'Terça-feira', '19:00:00'),
(2, 'Sexta-feira', '22:00:00'),
(3, 'Quinta-feira', '18:30:00'),
(3, 'Sabado', '20:30:00'),
(4, 'Domingo', '19:00:00'),
(5, 'Segunda-feira', '22:30:00'),
(6, 'Quarta-feira', '20:00:00'),
(7, 'Terça-feira', '18:00:00'),
(7, 'Sexta-feira', '23:30:00'),
(8, 'Quinta-feira', '21:00:00'),
(9, 'Sabado', '22:00:00'),
(10, 'Domingo', '20:30:00');

