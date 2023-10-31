# Orgazinação das tabelas do banco de dados

## Tabela Cliente
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
>* Descricão (VARCHAR(45) NOT NULL)
>* Categoria (VARCHAR(45) NOT NULL)
>* Quantidade (INT NOT NULL)
>* Preço

## Tabela Carrinho de Compras
### Cliente
    ID do Cliente (Primary Key)
    Nome
    Email
    *dados pegos da propria tabela cliente*

### Produto

    ID do Produto (Primary Key)
    Nome do Produto
    Descrição
    Preço
    *dados pegos da propria tabela produto*


## Tabela Transação
>Campos:
>* ID (INT PRIMARY KEY AI)
>* Hora (timestamp)
>* Forma de pagamento
>* Tipo da movimentação
>* Quantidade
>* id_produto
>* id_usuario

Detalhes da Compra

    ID da Compra (Primary Key)
    ID do Cliente (chave estrangeira referenciando a tabela Cliente)
    Data da Compra
    Status da Compra (pendente, concluída, cancelada, etc.)

    ID do Detalhe da Compra (Primary Key)
    ID da Compra (chave estrangeira referenciando a tabela Compra)
    ID do Produto (chave estrangeira referenciando a tabela Produto)
    Quantidade do Produto
    Preço Unitário na hora da compra
    Total (calculado multiplicando a quantidade pelo preço unitário)

# Relacionamento entre tabelas

A tabela "Transação" tem uma chave estrangeira produto_id e id_usuario que se relaciona com a chave primária produto_id na tabela "Produto" e se relaciona com a chave primaria ID na tabela "Login" em suas respectivas ordens. Isso vincula cada transação a um produto específico.

Por exemplo, se você deseja rastrear informações sobre qual fornecedor forneceu um determinado produto, você pode adicionar uma chave estrangeira fornecedor_id na tabela "Produto" para se relacionar com a tabela "Fornecedor".
