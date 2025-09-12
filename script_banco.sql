create database if not exists cadastro_livros;

create table if not exists autor(
	codau int not null auto_increment primary key,
	nome varchar(40)
);

create table if not exists livro(
	codl int not null auto_increment primary key,
    titulo varchar(40),
    editora varchar(40),
    edicao int,
    anopublicacao varchar(4)
);

create table if not exists assunto(
	codas int not null auto_increment primary key,
    descricao varchar(20)
);

create table if not exists livro_autor(
	livro_codl int not null,
    autor_codau int not null,
	CONSTRAINT Livro_Autor_FKIndex1 FOREIGN KEY (livro_codl) REFERENCES livro (codl) ON DELETE restrict ON UPDATE restrict,
    CONSTRAINT Livro_Autor_FKIndex2 FOREIGN KEY (autor_codau) REFERENCES autor (codau) ON DELETE restrict ON UPDATE restrict
);

create table if not exists livro_assunto(
	livro_codl int not null,
    assunto_codas int not null,
    CONSTRAINT Livro_Assunto_FKIndex1 FOREIGN KEY (livro_codl) REFERENCES livro (codl) ON DELETE restrict ON UPDATE restrict,
    CONSTRAINT Livro_Assunto_FKIndex2 FOREIGN KEY (assunto_codas) REFERENCES assunto (codas) ON DELETE restrict ON UPDATE restrict
);

create view if not exists vw_relatorio_cad_livros AS
	SELECT 
	    a.codau AS autor_id,
	    a.nome AS autor_nome,
	    l.codl AS livro_id,
	    l.titulo AS livro_titulo,
	    l.valor AS livro_valor,
	    l.edicao AS livro_edicao,
	    l.anopublicacao AS livro_ano,
	    GROUP_CONCAT(DISTINCT s.descricao SEPARATOR ', ') AS assuntos
	FROM 
	    livro l
	INNER JOIN 
	    livro_autor la ON la.livro_codl = l.codl
	INNER JOIN 
	    autor a ON a.codau = la.autor_codau
	LEFT JOIN 
	    livro_assunto ls ON ls.livro_codl = l.codl
	LEFT JOIN 
	    assunto s ON s.codas = ls.assunto_codas
	GROUP BY 
	    a.codau, l.codl
	ORDER BY 
	    a.nome, l.titulo;