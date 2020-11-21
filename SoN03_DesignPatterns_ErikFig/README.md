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


## PADRÕES DE CRIAÇÃO

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


### Prototype

- Em escopo de Objeto (run-time) e nao de Classes (build-time)
- Clona de um objeto q ja esta funcional
- **Problema**: Especificar os tipos de objetos a serem criados usando uma instância-protótipo e criar novos objetos pela cópia desse protótipo.
- **Aplicabilidade**:
    - quando as classes a instanciar forem especificadas em tempo de execução, por exemplo, por carga dinâmica;
    - para evitar a construção de uma hierarquia de classes de fábricas paralela à hierarquia de classes de produto;
    - quando as instâncias de uma classe puderem ter uma dentre poucas combinações diferentes de estados. Pode ser mais conveniente instalar um número correspondente de protótipos e cloná-los, ao invés de instanciar a classe manualmente, cada vez com um estado apropriado.


### Singleton

- **Problema**: Garantir que uma classe tenha somente uma instância e fornecer um ponto global de acesso para a mesma.
- **Aplicabilidade**:
    - for preciso haver apenas uma instância de uma classe, e essa instância tiver que dar acesso aos clientes através de um ponto bem conhecido;
    - a única instância tiver de ser extensível através de subclasses, possibilitando aos clientes usarem uma instância estendida sem alterar o seu código.
- Anti-pattern? Talvez!!!
    - Contra 1: Forte acoplamento, nao é possivel injetar dentro dela,
    - Contra 2: Escopo
    - Contra 3: Testes Unitários, terá que ser por testes de integração ou comportamento



## PADRÕES ESTRUTURAIS

### Adapter

- **Problema**: Converter a interface de uma classe em outra interface, esperada pelos clientes. O Adapter permite que classes com interfaces incompatíveis trabalhem em conjunto –
o que, de outra forma, seria impossível.
- **Aplicabilidade**:
    - você quiser usar uma classe existente, mas sua interface não corresponder à interface de que necessita;
    - você quiser criar uma classe reutilizável que coopere com classes não-relacionadas ou não-previstas, ou seja, classes que não necessariamente tenham interfaces compatíveis;
    - (somente para adaptadores de objetos) você precisar usar várias subclasses existentes, porém, for impraticável adaptar essas interfaces criando subclasses para cada uma. Um adaptador de objeto pode adaptar a interface da sua classe-mãe.


### Bridge

- **Problema**: Desacoplar uma abstração da sua implementação, de modo que as duas possam variar independentemente.
- **Aplicabilidade**:
    - desejar evitar um vínculo permanente entre uma abstração e sua implementação. Isso pode ocorrer, por exemplo, quando a implementação deve ser selecionada ou alterada em tempo de execução;
    - tanto as abstrações como suas implementações tiverem de ser extensíveis por meio de subclasses. Neste caso, o padrão Bridge permite combinar as diferentes abstrações e implementações e estendê-las independentemente;
    - mudanças na implementação de uma abstração não puderem ter impacto sobre os clientes; ou seja, quando o código dos mesmos não puder ser recompilado.
    - (C++) você desejar ocultar completamente a implementação de uma abstração dos clientes. Em C++, a representação de uma classe é visível na interface da classe;
    - desejar compartilhar uma implementação entre múltiplos objetos (talvez usando a contagem de referências) e este fato deve estar oculto do cliente.


### Composite

- **Problema**:
    - Compor objetos em estruturas de árvore para representarem hierarquias partes-todo.
    - Composite permite aos clientes tratarem de maneira uniforme objetos individuais e composições de objetos.
- **Aplicabilidade**:
    - quiser representar hierarquias partes-todo de objetos;
    - quiser que os clientes sejam capazes de ignorar a diferença entre composições de objetos e objetos individuais. Os clientes tratarão todos os objetos na estrutura composta de maneira uniforme.


### Strategy

- **Estrutural**
- “Policy”
- Define uma família ou tipo de classe de forma a reforçar, principalmente, os princípios **Open/Closed** e de **Liskov** do SOLID.
- Uma única interface e uma ou mais classes concretas definem este padrão de projeto.









