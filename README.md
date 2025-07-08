# Sistema de Gestão Escolar - Laravel & PHP

Este é um projeto pessoal desenvolvido com Laravel 9 e PHP 8 para gerenciamento básico de alunos, turmas, e documentos escolares, com foco em segurança e organização.

---

## 🚀 Visão Geral

O sistema permite cadastrar, editar e visualizar informações dos alunos e suas turmas, além de armazenar e proteger documentos e fotos pessoais de forma privada, acessíveis somente a usuários autenticados.

Este projeto demonstra conhecimento prático em desenvolvimento backend com Laravel, manipulação de arquivos, controle de acesso e boas práticas de segurança.

---

## 🛠 Tecnologias Utilizadas

- PHP 8
- Laravel 9
- Composer
- Blade (template engine do Laravel)
- Bootstrap 5 (para interface básica e responsiva)
- MySQL (banco de dados relacional)
- Git (controle de versão)
- Docker
- Nginx (servidor web em ambiente Docker)
  
---

## 📋 Funcionalidades Principais

- Cadastro, edição e listagem de alunos e turmas com relacionamentos via Eloquent ORM
- Upload e armazenamento seguro de fotos e documentos dos alunos em armazenamento privado
- Rotas protegidas por autenticação (middleware `auth`) para acesso restrito a dados sensíveis
- Exibição dinâmica e segura das fotos dos alunos via controller dedicado, impedindo acesso público direto
- Interface simples e responsiva para facilitar o uso por professores e administradores
- Estrutura organizada de código seguindo padrões MVC do Laravel

---

## 🔒 Segurança e Boas Práticas

- Utilização do sistema de autenticação padrão do Laravel para proteger rotas e dados
- Armazenamento de arquivos sensíveis em pastas não acessíveis publicamente (`storage/app/alunos`)
- Controle rigoroso de acesso via middleware e verificação de existência dos arquivos antes de servir conteúdo
- Código modularizado e limpo para facilitar manutenção e futuras extensões

---

## 💡 Aprendizados e Desafios

Este projeto foi uma oportunidade para consolidar conhecimentos em:

- Desenvolvimento web com Laravel e PHP moderno
- Manipulação segura de arquivos no filesystem do Laravel
- Criação de rotas, controllers e middleware para proteção e organização
- Integração entre backend e frontend com Blade e Bootstrap
- Estruturação de um sistema funcional com foco na segurança e usabilidade

---

## Contato

Gabriel Gomes dos Santos  
[Seu LinkedIn] | [Seu GitHub] | [Seu E-mail]

---

## Considerações Finais

Este projeto é um excelente exemplo de desenvolvimento web com Laravel, focando em funcionalidades essenciais para um sistema escolar, além de destacar práticas importantes para segurança e organização do código. Estou aberto a expandi-lo, refatorá-lo e melhorar conforme as necessidades do mercado.

---
