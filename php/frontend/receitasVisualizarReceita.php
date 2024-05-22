bora visualizar uma receita

esboço do mysql
SELECT receitas.id, receitas.nome, receitas.descricao, receitas.quantidadeDePorcoes, alimentos1.nome as i1, 
alimentos2.nome as i2,
receitas.preparo FROM receitas 
JOIN alimentos as alimentos1 on alimentos1.id = receitas.i1
JOIN alimentos as alimentos2 on alimentos2.id = receitas.i2
WHERE 1