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


### Builder

- **Problema**: Separar a construção de um objeto complexo da sua representação de modo que o mesmo processo de construção possa criar diferentes representações.
- **Aplicabilidade**:
    - O algoritmo para criação de um objeto complexo deve ser independente das partes que compõem o objeto e de como elas são montadas.
    - O processo de construção deve permitir diferentes representações para o objeto que é construído.
- **Estrutura**:
    - Interface Builder: Define o Builder
    - Interface Director: Define o Director
    - Builder Concreto: Informa q cada etapa faz para o produto pode ser construído (como faz)
    - Director Concreto: Informa a ordem que os passos serão feitos (passo-a-passo)
    - Produto: resultado obtido no final


### Factory Method

- **Problema**: Definir uma interface para criar um objeto, mas deixar as subclasses decidirem que classe instanciar. O Factory Method permite adiar a instanciação para subclasses.
- **Aplicabilidade**:
    - uma classe não pode antecipar a classe de objetos que deve criam;
    - uma classe quer que suas subclasses especifiquem os objetos que criam;
    - classes delegam responsabilidade para uma dentre várias subclasses auxiliares, e você quer localizar o conhecimento de qual subclasse auxiliar que é a delegada.


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







### Prototype


