create database if not exists bibliotex;

use bibliotex;

create table if not exists livros (
	ISBN varchar(30),
	nomeLivro varchar(100),
    valorLivro REAL,
    descricao varchar(500), #Sim eu sei, é muita coisa, é so por segurança
    nome_da_foto varchar(30),
	primary key(ISBN)
);

# Inserindo alguns livros no banco
insert into livros values ("001", "O labirinto do fauno", 25.0, "Um dos filmes mais aclamados dos últimos tempos, O Labirinto do Fauno transborda das telas do cinema em obra que expande o universo de fantasia e horror da obra-prima de Del Toro",  "media/livro1.jpg");
insert into livros values ("002","Dragões de Éter: Caçadores de Bruxas",  17.0, "Caçadores de Bruxas é o início da tetralogia e como um Bardo, Raphael Draccon praticamente nos “canta” a história da criação de Nova Ether, do nascimento da Era Antiga até a tão esperada Era Nova.", "media/livros2.jpg");
insert into livros values ("003",  "A Guerra dos Tronos : As Crônicas de Gelo e Fogo", 21.0, "A guerra dos tronos é o primeiro livro da série best-seller internacional As Crônicas de Gelo e Fogo, que deu origem à adaptação de sucesso da HBO, Game of Thrones.", "media/livros3.jpg");
insert into livros values ("004",  "Decifra-me", 60.0,"Prepare-se para mais um livro imperdível de Tahereh Mafi, narrado sob o ponto de vista de Kenji Kishimoto, um dos personagens mais queridos pelos fãs da série Estilhaça-me. Decifra-me reúne os contos Proteja-me e Revela-me, que vão te trazer de volta ao mundo distópico de Estilhaça-me antes do desfechotriunfal da série!", "media/livros4.jpg");
insert into livros values ("005", "A rainha vermelha",  45.0,"O mundo de Mare Barrow é dividido pelo sangue: vermelho ou prateado. Mare e sua família são vermelhos: plebeus, humildes, destinados a servir uma elite prateada cujos poderes sobrenaturais os tornam quase deuses. Mare rouba o quepode para ajudar sua família a sobreviver e não tem esperanças de escapar do vilarejo miserável onde mora.", "media/livros9.jpg");
insert into livros values ("006",  "Espada de vidro", 47.0,"O sangue de Mare Barrow é vermelho, da mesma cor da população comum, mas sua habilidade de controlar a eletricidade a torna tão poderosa quanto os membrosda elite de sangue prateado. Depois que essa revelação foi feita em redenacional, Mare se transformou numa arma perigosa que a corte real quer esconder e controlar.", "media/livros6.jpg");
insert into livros values ("007",  "A prisão do rei",49.0, "Mare Barrow foi capturada e passa os dias presa no palácio, impotente sem seu poder, atormentada por seus erros. Ela está à mercê do garoto por quem um dia se apaixonou, um jovem dissimulado que a enganou e traiu. Agora rei, Mavencontinua com os planos de sua mãe, fazendo de tudo para manter o controle de Norta - e de sua prisioneira.", "media/livros7.webp");
insert into livros values ("008", "Trono destruído: Coletânea definitiva da série A Rainha Vermelha", 51.0,  "Trono destruído é uma coletânea essencial para todos os leitores da série best-seller de Victoria Aveyard que ficaram com vontade de passar mais tempo com os personagens depois do fim de Tempestade de guerra.", "media/livros8.jpg");
insert into livros values ("009",  "Um tom mais escuro de magia", 60.0,"Um tom mais escuro de magia é o início de um universo de aventuras audaciosas, poder e múltiplas cidades de Londres.", "media/livros5.jpg");
insert into livros values ("010",  "A Biblioteca da Meia-Noite", 38.0, "A Biblioteca da Meia-Noite é um romance incrível que fala dos infinitos rumos que a vida pode tomar e da busca incessante pelo rumo certo.", "media/livros10.jpg");
insert into livros values ("011",  "A vida invisível de Addie LaRue",46.0, "Uma vida que ninguém lembra. Um livro que ninguém esquece.Em A vida invisível de Addie LaRue, o aguardado best-seller de V.E. Schwab,conheça Addie e se perca em sua vida invisível ― porém memorável.", "media/livros11.jpg");
insert into livros values ("012",  "Corte de Nevoa e Fúria", 72, "Por amor ela enganou a morte. Por liberdade, ela se tornará uma arma. Corte de névoa e fúria é o esperado segundo volume da saga iniciada em Corte de espinhos e rosas. Sarah J. Maas é uma verdadeira estrela: após apenas umasemana de vendas, a série Corte de Espinhos e Rosas estreou em segundo lugar na lista do New York Times.", "media/livros12.jpg");

#drop table livros;
#drop table vendedor;
#drop table endereco;
#drop table compras;

#select * from livros;
#select * from vendedor;
#select * from endereco;
#select * from compras;
#SELECT * FROM vendedor, endereco WHERE endereco.cpf = cpf AND endereco.cpf = 2;

CREATE TABLE if not exists vendedor(


	codigo_vendedor INT AUTO_INCREMENT,
	cpf varchar(13) UNIQUE,
	nomeCompleto varchar(40),
	data_de_nascimento DATE,
    nacionalidade varchar(40),
	primary key(codigo_vendedor)
);


insert into vendedor VALUES (001, "1234567891233", "Gabriel Felipe", "2003/04/14", "Brasileiro");
insert into vendedor VALUES (002, "123456789124", "Gabriely Cavalcante", "2003/04/14", "Brasileiro");
insert into vendedor VALUES (003, "12465887",	"Antônio Morrendo das Dores",	"1996-07-14",	"Brasileiro");

select * from vendedor;

create table if not exists endereco (
	cpfDono varchar(13),
    bairro varchar(40),
    endereco  varchar(40),
    cidade  varchar(40),
    estado  varchar(40),
    cep varchar(40),
    complemento varchar(40),
	foreign key (cpfDono) references vendedor(cpf)
		ON DELETE CASCADE
);

insert into endereco VALUES ("1234567891233", "Pimentas", "Av. Salgado FIlho","Guarulhos","São Paulo", "07115-0001", "Dani Salgados");

insert into endereco VALUES ("123456789124", "Pimentas", "Av. Salgado FIlho","Guarulhos","São Paulo", "07115-0001", "Dani Salgados");

insert into endereco VALUES ("12465887",	"Pimentas",	"Av. Salgado FIlho", "Guarulhos", "São Paulo", "07115-000", "Dani Salgados");

create table if not exists compras (
	id int AUTO_INCREMENT UNIQUE,
	cpfComprador varchar(13),
	ISBNlivro varchar(30),
    codVendedor INT,
	valor REAL,
	cartao varchar(19),
    foreign key (ISBNlivro) references livros(ISBN),
    foreign key (codVendedor) references vendedor(codigo_vendedor)
		ON DELETE CASCADE
);


insert into compras VALUES (1, "1234567891233", "004", "2", 240, "1234-5119");

insert into compras VALUES (2, "12345675268", "001", "2", 50, "1234-6125");
insert into compras VALUES (3, "46522714552", "002", "1", 17, "1234-5612");
insert into compras VALUES (6, "246579158228", "006", "3", 47, "1234-5699");
insert into compras VALUES (4, "49960670828", "012", "1", 72, "1234-4568");
insert into compras VALUES (5, "46125781212", "005", "3", 45, "1234-1234");
insert into compras VALUES (7, "46125781212", "005", "1", 90, "1234-1234");

CREATE TABLE if not exists usuario(
	nome varchar(40),
	nascimento DATE,
    telefone varchar (13),
    email varchar(40),
    senha varchar(100),
    fotoPerfil varchar(40),
	primary key(email)
);

insert into usuario VALUES ("Administrador",	"2023-04-14", "(11) 2484-515",	"admin@admin.com",	"$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa",	"fotosPerfil/Administrador.png"); 
insert into usuario VALUES ("Teste Testando", "2023-04-14",	"(11) 2484-515",	"teste@teste.com",	"$2y$10$QgbyE/MweK0/HgwlVI5mqOc3R90KmsXXyf/qfiRFgYkzrqhfnPnci",	"fotosPerfil/Teste Testando.png"); 

select * from usuario;

-- drop table usuario
