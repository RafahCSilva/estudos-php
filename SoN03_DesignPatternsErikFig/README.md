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


## Singleton

- Anti-pattern? Talvez!!!
- Contra 1: Forte acoplamento
- Contra 2: Escopo
- Contra 3: Testes Unitários


## Strategy

- “Policy”
- Define uma família ou tipo de classe de forma a reforçar, principalmente, os princípios Open/Closed e de Liskov do SOLID.
- Uma única interface e uma ou mais classes concretas definem este padrão de projeto.


## Builder

- Director Concreto: Constrói o resultado
- Builder Concreto: Define os passos para o director
- Interface Director: Define o Director
- Interface Builder: Define o Builder


## MVC (Teoria)
