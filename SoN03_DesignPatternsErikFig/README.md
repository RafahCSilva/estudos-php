# Design Patterns

- "Padrões de projeto – Soluções reutilizáveis de software orientado a objetos." - Livro

- The Gang of Four (GOF):
    - Erich Gama
    - Richard Helm
    - Ralph Johnson
    - Josh Vlissides

- 23 padrões de projeto segundo GOF:
    - Padrões de criação (5)
        - Abstract Factory - Builder - Factory Method - Prototype - Singleton
    - Padrões estruturais (7)
        - Adapter - Bridge - Composite - Decorator - Façade (ou Facade) - Flyweight - Proxy
    - Padrões comportamentais (11)
        - Chain of Responsibility - Command - Interpreter - Iterator - Mediator - Memento - Observer - State - Strategy - Template Method – Visitor
- 24º Padrão - MVC
    - Model -> Lógica
    - View -> Exibição
    - Controller -> Fluxo

- O escopo dos padrões de projeto
    - Escopo de classe (Relacionamentos definidos nas classes)
    - Escopo de objeto (Relacionamentos definidos nos objetos, em tempo de execução)


## Padrões de criação

### Abstract Factory

- **Problema**: Criação de conjunto de objetos relacionados ou dependentes sem especificar suas classes concretas. O cliente da fábrica de abstração não precisa se preocupar como estes objetos são criados, ele só sabe obtê-los.
- **Aplicabilidade**:
    - Um sistema deve ser independente de como seus produtos são criados, compostos ou representados;
    - Um sistema deve ser configurado como um produto de uma família de múltiplos produtos;
    - Uma família de objetos-produto for projetada para ser usada em conjunto, e você necessita garantir esta restrição;
    - Você quer fornecer uma biblioteca de classes de produtos e quer revelar somente suas interfaces, não suas implementações
- **Estrutura**:
    - Interface para a Entidade
    - Interface para a Factory
    - Entidade concreta para cada tipo
    - Factory Concreta para construir internamente as entidades e a retorna-la


### Singleton

- Anti-pattern? Talvez!!!
- Contra 1: Forte acoplamento
- Contra 2: Escopo
- Contra 3: Testes Unitários


### Strategy

- **Estrutural**
- “Policy”
- Define uma família ou tipo de classe de forma a reforçar, principalmente, os princípios **Open/Closed** e de **Liskov** do SOLID.
- Uma única interface e uma ou mais classes concretas definem este padrão de projeto.


### Builder

- Director Concreto: Constrói o resultado
- Builder Concreto: Define os passos para o director
- Interface Director: Define o Director
- Interface Builder: Define o Builder




### Factory Method



### Prototype


