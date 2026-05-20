# Equilibra - Sistema de Gestão Financeira Pessoal

O *Equilibra* é uma aplicação web Full-Stack projetada para auxiliar na organização financeira pessoal. O sistema foi reformulado com uma arquitetura multiusuário segura, permitindo o registro de transações, controle completo de relatórios e isolamento total de dados através de sessões ativas.

---

# Funcionalidades

- **Dashboard (Visão Geral):** Painel principal com o resumo dinâmico do saldo atual, total de receitas e total de despesas calculados em tempo real para o usuário logado.
- **CRUD Completo de Transações:** Controle total sobre as movimentações financeiras através das operações de:
  - **Inclusão:** Cadastro de novas receitas e despesas especificando valor, tipo, data e categoria.
  - **Leitura/Listagem:** Visualização organizada de todas as movimentações na tela de relatórios.
  - **Alteração:** Edição de dados de transações já cadastradas com preenchimento dinâmico.
  - **Exclusão:** Remoção definitiva de registros com atualização instantânea dos saldos.
- **Autenticação e Segurança:** Sistema de Login e Cadastro robusto utilizando criptografia de senhas (`password_hash` e `password_verify`).
- **Isolamento de Dados (Multiusuário):** Proteção de rotas baseada em sessões nativas do PHP. Garante que cada usuário acesse e gerencie única e exclusivamente as suas próprias informações financeiras.

## 🛠️ Tecnologias Utilizadas

**DevOps & Ambiente:**
- [GitHub Codespaces] - Ambiente de desenvolvimento colaborativo centralizado em nuvem.
- Git & GitHub - Controle de versão e rastreabilidade de código.

**Front-end:**
- HTML5
- CSS3

**Back-end:**
- [PHP] - Linguagem de programação do servidor, utilizando a extensão **PDO** (Prepared Statements) para proteção nativa contra ataques de *SQL Injection*.

**Banco de Dados:**
- [MySQL] -

---

# Como Instalar e Rodar

**Pré-requisito:** Você precisa ter o ambiente do **GitHub Codespaces** ativo ou o **PHP 7.4+** instalado localmente.

### 1. Configuração do Banco de Dados
Antes de iniciar o servidor, a estrutura do banco precisa ser criada:
1. Abra o seu gerenciador de banco de dados (como o **phpMyAdmin**).
2. Importe e execute o script contido no arquivo `banco.sql` localizado na raiz do projeto. Este comando criará as tabelas `usuarios` (com restrição de e-mail único) e `transacoes` vinculadas relacionalmente.

### 2. Inicialização do Servidor
1. Abra o **Terminal** na pasta raiz do projeto.
2. Inicie o servidor embutido do PHP executando o seguinte comando:
   ```bash
   php -S 0.0.0.0:8080
