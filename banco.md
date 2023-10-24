# Orgazinação das tabelas do banco de dados

## Tabela Login
>Campos:
>* ID (INT PRIMARY KEY AI)
>* Nome (VARCHAR(70) NOT NULL)
>* E-mail (VARCHAR(150) NOT NULL UNIQUE)
>* CPF (VARCHAR(11) NOT NULL UNIQUE) (opcional)
>* Senha (MD5(60) NOT NULL)

## Tabela Produto
>Campos:
>* ID (INT PRIMARY KEY AI)
>* Nome (VARCHAR(70) NOT NULL)
>* Produto ()
>* Tipo ()
>* Quantidade (INT NOT NULL)
>* Preço

## Fornecedor
>Campos:
>* ID_fornecedor (INT PRIMARY KEY AI)
>* nome_fornecedor
>* cnpj_fornecedor
>* fone_fornecedor

## Tabela Transação
>Campos:
>* ID (INT PRIMARY KEY AI)
>* Hora (timestamp)
>* Forma de pagamento
>* Tipo da movimentação
>* Quantidade
>* id_produto
>* id_usuario
>

# Relacionamento entre tabelas

A tabela "Transação" tem uma chave estrangeira produto_id e id_usuario que se relaciona com a chave primária produto_id na tabela "Produto" e se relaciona com a chave primaria ID na tabela "Login" em suas respectivas ordens. Isso vincula cada transação a um produto específico.

Por exemplo, se você deseja rastrear informações sobre qual fornecedor forneceu um determinado produto, você pode adicionar uma chave estrangeira fornecedor_id na tabela "Produto" para se relacionar com a tabela "Fornecedor".
