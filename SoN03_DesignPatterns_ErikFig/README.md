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


### Decorator

- **Problema**: Dinamicamente, agregar responsabilidades adicionais a um objeto. Os Decorators fornecem uma alternativa flexível ao uso de subclasses para extensão de funcionalidades.
- **Aplicabilidade**:
    - para acrescentar responsabilidades a objetos individuais de forma dinâmica e transparente, ou seja, sem afetar outros objetos;
    - para responsabilidades que podem ser removidas;
    - quando a extensão através do uso de subclasses não é prática. Às vezes, um grande número de extensões independentes é possível e isso poderia produzir uma explosão de subclasses para suportar cada combinação. Ou a definição de uma classe pode estar oculta ou não estar disponível para a utilização de subclasses.


### Façade

- **Problema**:
    - Fornecer uma interface unificada para um conjunto de interfaces em um subsistema.
    - Façade define uma interface de nível mais alto que torna o subsistema mais fácil de ser usado.
- **Aplicabilidade**:
    - você desejar fornecer uma interface simples para um subsistema complexo. Os subsistemas se tornam mais complexos à medida que evoluem. A maioria dos padrões, quando aplicados, resulta em mais e menores classes. Isso torna o subsistema mais reutilizável e mais fácil de customizar, porém, também se torna mais difícil de usar para os clientes que não precisam customizá-lo. Uma fachada pode fornecer, por comportamento-padrão, uma visão simples do sistema, que é boa o suficiente para a maioria dos clientes. Somente os clientes que demandarem maior customização necessitarão olhar além da fachada;
    - existirem muitas dependências entre clientes e classes de implementação de uma abstração. Ao introduzir uma fachada para desacoplar o subsistema dos clientes e de outros subsistemas, estar-se-á promovendo a independência e portabilidade dos subsistemas


### Flyweight

- **Problema**: Usar compartilhamento para suportar eficientemente grandes quantidades de objetos de granularidade fina.
- **Aplicabilidade**:
    - A eficiência do padrão Flyweight depende muito de como e onde ele é usado. Aplique o padrão Flyweight quando todas as condições a seguir forem verdadeiras:
    - uma aplicação utiliza um grande número de objetos;
    - os custos de armazenamento são altos por causa da grande quantidade de objetos;
    - a maioria dos estados de objetos pode ser tornada extrínseca;
    - muitos grupos de objetos podem ser substituídos por relativamente poucos objetos compartilhados, uma vez que estados extrínsecos são removidos;
    - a aplicação não depende da identidade dos objetos. Uma vez que objetos Flyweights podem ser compartilhados, testes de identidade produzirão o valor verdadeiro para objetos conceitualmente distintos.


### Proxy

- **Problema**: Fornece um substituto (surrogate) ou marcador da localização de outro objeto para controlar o acesso a esse objeto.
- **Aplicabilidade**:
    - Um virtual proxy cria objetos caros sob demanda.
    - Um protection proxy controla o acesso ao objeto original. Os proxies de proteção são úteis quando os objetos devem ter diferentes direitos de acesso.
    - Um smart reference é um substituto para um simples pointer que executa ações adicionais quando um objeto é acessado. Usos típicos incluem:
        - contar o número de referências para o objeto real, de modo que o mesmo possa ser liberado automaticamente quando não houver mais referências
        - carregar um objeto persistente para a memória quando ele for referenciado pela primeira vez;
        - verificar se o objeto real está bloqueado antes de ser acessado, para assegurar que nenhum outro objeto possa mudá-lo.



## PADRÕES COMPORTAMENTAIS

### Chain of Responsibility

- **Problema**: Evitar o acoplamento do remetente de uma solicitação ao seu receptor, ao dar a mais de um objeto a oportunidade de tratar a solicitação. Encadear os objetos receptores, passando a solicitação ao longo da cadeia até que um objeto a trate.
- **Aplicabilidade**:
    - mais de um objeto pode tratar uma solicitação e o objeto que a tratará não conhecido a priori. O objeto que trata a solicitação deve ser escolhido automaticamente;
    - você quer emitir uma solicitação para um dentre vários objetos, sem especificar explicitamente o receptor;
    - o conjunto de objetos que pode tratar uma solicitação deveria ser especificado dinamicamente.


### Command

- **Problema**: Encapsular uma solicitação como um objeto, desta forma permitindo parametrizar clientes com diferentes solicitações, enfileirar ou fazer o registro (log) de solicitações e suportar operações que podem ser desfeitas.
- **Aplicabilidade**:
    - parametrizar objetos por uma ação a ser executada. Você pode expressar tal parametrização numa linguagem procedural através de uma função callback, ou seja, uma função que é registrada em algum lugar para ser chamada em um momento mais adiante. Os Commands são uma substituição orientada o objetos para callbacks;
    - especificar, enfileirar e executar solicitações em tempos diferentes. Um objeto Command pode ter um tempo de vida independente da solicitação orginal. Se o receptor de uma solicitação pode ser representado de uma maneira independente do espaço de endereçamento, então você pode transferir um objeto command para a solicitação para um processo diferente e lá atender a solicitação;
    - suportar desfazer operações. A operação Execute, de Command, pode armazenar estados para reverter seus efeitos no próprio comando. A interface de Command deve ter acrescentada uma operação Unexecute, que reverte os efeitos de uma chamada anterior de Execute. Os comandos executados são armazenados em uma lista histórica. O nível ilimitado de desfazer e refazer operações é obtido percorrendo esta lista para trás e para frente, chamando operações Unexecute e Execute, respectivamente;


### Interpreter

- **Problema**: Dada uma linguagem, definir uma representação para a sua gramática juntamente com um interpretador que usa a representação para interpretar sentenças dessa linguagem.
- **Aplicabilidade**:
    - a gramática é simples. Para gramáticas complexas, a hierarquia de classes para a gramática se torna grande e incontrolável. Em tais casos, ferramentas tais como geradores de analisadores são uma alternativa melhor. Elas podem interpretar expressões sem a construção de árvores sintáticas abstratas, o que pode economizar espaço e, possivelmente, tempo;
    - a eficiência não é uma preocupação crítica. Os interpretadores mais eficientes normalmente não são implementados pela interpretação direta de árvores de análise sintática, mas pela sua tradução para uma outra forma. Por exemplo, expressões regulares são freqüentemente transformadas em máquinas de estado. Porém, mesmo assim, o tradutor pode ser implementado pelo padrão Interpreter, sendo o padrão, portanto, ainda aplicável.


### Strategy

- **Estrutural**
- “Policy”
- Define uma família ou tipo de classe de forma a reforçar, principalmente, os princípios **Open/Closed** e de **Liskov** do SOLID.
- Uma única interface e uma ou mais classes concretas definem este padrão de projeto.



## Run this project

````shell script
composer install
./run_tests.sh
./run_send_sonar_local.sh

# fast testing
./run_tests.sh --fast
````
