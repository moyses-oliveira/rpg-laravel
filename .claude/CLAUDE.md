# Projeto

Este é um sistema para um Tabletop RPG desenvolvido em Laravel 12 e PHP 8.2, MySQL com frontend em Vue3

Antes de realizar qualquer alteração, compreenda a arquitetura descrita abaixo.

---

# Regras Gerais

* Não atualizar dependências sem solicitação explícita.
* Não migrar código para versões mais recentes do PHP.
* Compatibilidade obrigatória com PHP 7.2.
* Compatibilidade obrigatória com Laravel 12.
* Evitar sintaxes introduzidas após PHP 8.2.
* Não alterar contratos públicos de APIs sem autorização.
* Sempre manter retrocompatibilidade.
* Não modificar nomes de métodos ou classes, se for essencial, melhor recriar outra classe ou método com outro nome.
* Estrutura de código sempre em Inglês

---
# Convenções

## Banco de Dados

##### Chaves primárias:

id

##### Campos inteiro

Exemplos:

 - user.id (unsigned integer)
 - user.intBitwiseType

##### Campos Json:

 - jsonSettings
 
##### String
 - vrcName
 - vrcEmail

Campose

##### Chaves estrangeiras:

Usar fkExternalTable

Exemplos:

 - fkUser
 - fkCharacter

---

## Migrations

Modificação de estrutura de tabelas em banco de dados só devem ser feitas se for explicitamente solicitado na task.

Sempre seguir o padrão:

$table->bigIncrements('intId');

Exemplo de FK:

$table->unsignedBigInteger('fkUser');

Evitar nomes diferentes do padrão.

---

## Multi-Tenant

O sistema atende múltiplos clientes.

Nunca assumir que existe apenas um tenant.

Toda consulta deve respeitar o contexto do tenant atual.

---

# Padrões de Código

Priorizar:

* Legibilidade
* Simplicidade
* Performance

Evitar:

* Overengineering
* Design patterns desnecessários
* Abstrações prematuras

---

# Ao Gerar Código

Antes de responder:

1. Identifique o módulo afetado.
2. Identifique impactos em outros módulos.
3. Verifique compatibilidade PHP 8.2
4. Verifique compatibilidade Laravel 12
5. Se existir alteração e existir riscos, antes explique os riscos

---

# Ao Criar Queries

Prioridades:

1. Índices existentes
2. Menor uso de memória
3. Menor número de consultas
4. Evitar N+1

Sempre considerar uso de eager loading quando apropriado.

---

# Contexto de Negócio

O foco do produto é um jogo de RPG de mesa automátizado sem abandonar o papel do mestre (sendo ele uma IA ou não)
 - o propósito é que as partidas sejam rapidas para inciar de maneira que um personagem quase sempre já vem pronto com mínima customização
 - Se os jogadores resolverem engajar em construção de personagem o sistema de regras precisam permitir sem desequilibrar totalmente as partidas
 - O jogo é feito para rodar principalemente com 2 a 6 jogadores considerando não é preciso garantir balanço de partidas com players=1 ou players>6
 - O projeto está em bootstrap, o unico objetivo agora é conseguir jogar uma batalha de players vs npcs do começo ao fim
 
### Batalhas
  - Um duelo entre 2 individuos semelhantes deve terminar de 1 a 4 rodadas
  - O jogador de classes de batalha corpo a corpo tem 75% contra NPCs de mesmo nível
  - Os magos / inventores vão ter probabilidade de falha
  - O jogador de classes de batalha a longa distancia, magos e inventores vão ter 50% contra NPCs de mesmo nível

### Universo fase 1
  O conceito base que eu gosto é o usado em X-COM 2, onde para evitar excesso de complexidade na fase 1, os jogadores sempre partem de uma realidade imposta e dura que não da opção para fugir das responsabilidades, porém para deixar as coisas mais interessantes é imporante que antes, durante ou depois da batalha exista um desafio paralelo, e para o sandbox esses desafios podem estar listados.
  O universo deve funcionar de modo genérico
  Obs.: a decisão sobre o universo será feita em outra faze do desenvolvimento
  
  1. Conflitos e combates podem ser Corpo a Corpo / combates a Distância / Uso de Soft Magic (Hard magic só será em eventos épicos ou no endgame)
  2. Economia: sistema de dinheiro e equipamentos serão focados em nível de personagem, deixar para uma outra fase a possibilidade de implementar essas mecânicas.
  3. Sistemas de desafios precisam ter importância (testes de percepção, escalada, natação, navegação, sobrevivêncialismo, disputas psicológicas, engenharia)
  
# Ao Criar APIs

Preferir:

* Services
* Form Requests
* Resources

Manter padrão REST existente.

---

# Quando Estiver em Dúvida

Não assumir.

Estrutura de dados nunca deve ser alterado sem questionamento.