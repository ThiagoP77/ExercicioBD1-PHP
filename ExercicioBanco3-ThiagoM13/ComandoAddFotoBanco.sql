/*
	Comandos utilizados para inserir o campo de foto na tabela "paciente"
	Aluno: Thiago Piffer Lauro. Turma: M13.
*/

USE tipi_vacinacao; 
ALTER TABLE paciente ADD fotoPaciente mediumblob NOT NULL AFTER idVacina;