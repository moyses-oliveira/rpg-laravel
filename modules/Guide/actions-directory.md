# Estrutura de Tipos de Ações (actions.md)

Este documento define a hierarquia de pastas dentro do diretório `Actions`, com o objetivo de masterizar a manutenção do sistema de regras e evitar o acúmulo de centenas de arquivos em uma única pasta. As ações são separadas por seu escopo de jogo, duração ou natureza.

| # | Nome da Pasta Sugerida | Foco e Escopo da Ação | Exemplo de Ações |
| :---: | :--- | :--- | :--- |
| 1 | `BattleActions` | Ações que consomem tempo/recursos em uma rodada de combate (Dano, Controle, Posição). | Ataque Padrão, Ataque de Oportunidade, Defender, Desarmar, Investida. |
| 2 | `MovementActions` | Ações de mudança de posição no cenário (tático ou estratégico). | Correr, Retirar-se, Fuga Tática, Montar/Desmontar, Deslocamento Rápido. |
| 3 | `InstantActions` | Ações que consomem um instante e resolvem uma única tarefa não-social (Objetos, Ambiente). | Abrir Porta, Saquear, Inspecionar Objeto, Teste de Percepção Rápida, Usar Item Simples. |
| 4 | `JobActions` | Ações que exigem ciclos de tempo longos (minutos, horas, dias) e podem ser interrompidas. | Forjar Item, Reparo de Equipamento, Treinamento de Habilidade, Pesquisa em Arquivos, Preparar Ritual. |
| 5 | `SocialActions` | Ações focadas em diplomacia, influência, ou interação complexa com NPCs. | Persuadir, Intimidar, Enganar (Blefe), Negociar, Fazer Discurso Público. |
| 6 | `ArcaneActions` | Ações de conjuração ou uso de poderes de natureza mágica/sobrenatural. | Conjurar Magia, Dissipar Efeito Mágico, Canalizar Poder, Foco Místico. |
| 7 | `TalentActions` | Ações únicas baseadas em talentos, classes ou *feats* específicos (não mágicos). | Golpes de Guerreiro (exclusivos), Habilidade de Ladrão (exclusiva), Grito de Batalha. |
| 8 | `SupportActions` | Ações focadas em aplicar *buffs*, *debuffs*, cura ou auxílio direto a aliados ou inimigos. | Curar Ferimento Leve, Proteger Aliado, Lançar Maldição (Debuff), Dar Cobertura. |
| 9 | `CraftingActions` | Ações focadas em criar, modificar ou manter itens. | Misturar Poções, Costurar/Remendar, Forjar Arma, Calibrar Instrumento. |
| 10 | `SurvivalActions` | Ações relacionadas ao ambiente selvagem, rastreamento, caça e coleta. | Rastrear Pista, Caçar Alimentos, Fazer Fogueira, Montar Acampamento Eficaz, Coletar Ervas. |
| 11 | `TriggerActions` | Ações que **não são executadas ativamente** pelo jogador, mas são **acionadas automaticamente** por um evento (Efeitos Passivos). | Reação Rápida, Contra-Ataque (ao ser atacado), Queda (ao ser empurrado), Defesa Automática. |
| 12 | `InventoryActions` | Ações de gerenciamento de equipamento durante o jogo (sacar, guardar, equipar). | Equipar Escudo, Sacar Arma, Guardar Objeto, Trocar Munição, Organizar Mochila (no *downtime*). |
| 13 | `VehicleActions` | Ações de controle ou interação com veículos, embarcações ou montarias. | Pilotar Embarcação, Cuidar da Montaria, Fazer Manobra Arriscada (com veículo). |
| 14 | `ChallengeActions` | Ações que resolvem enigmas, quebra-cabeças ou armadilhas. | Desativar Armadilha, Analisar Enigma, Decifrar Código, Inserir Senha. |

---

### Observações:

* **Modularidade:** Ações em uma pasta devem focar estritamente no seu escopo. A lógica comum a várias pastas (ex: cálculo de rolagem de dados) deve residir em `Helpers`.
* **Flexibilidade:** Se duas pastas tiverem poucas ações, elas podem ser consolidadas (ex: `CraftingActions` dentro de `JobActions`).
