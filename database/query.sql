Consulta nome do aluno, pontuação somada de cada fase e equipe por um id do usuário
SELECT DISTINCT(u.name), (SELECT SUM(p.ponto_obtido) FROM pontuacaos p WHERE user_id =3), m.equipe_id FROM
pontuacaos p, users u, matriculas m, fases f
WHERE u.id = 3 AND p.user_id = 3 AND m.user_id = 3
orderBy SUM(p.ponto_obtido);

Consulta os nomes das medalhas do aluno por id do usuário
SELECT DISTINCT(me.nome) FROM
pontuacaos p, medalhas me, fases f
WHERE p.user_id = 3 AND p.fase_id = f.id AND me.id = f.medalha_id;
