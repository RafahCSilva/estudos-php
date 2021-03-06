# Design Patterns

- [designpatternsphp.readthedocs.io](https://designpatternsphp.readthedocs.io/)
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


### Iterator

- **Problema**: Fornecer um meio de acessar, seqüencialmente, os elementos de um objeto agregado sem expor a sua representação subjacente.
- **Aplicabilidade**:
    - para acessar os conteúdos de um objeto agregado sem expor a sua representação interna;
    - para suportar múltiplos percursos de objetos agregados;
    - para fornecer uma interface uniforme que percorra diferentes estruturas agregadas (ou seja, para suportar a iteração polimórfica).


### Mediator

- **Problema**: Definir um objeto que encapsula a forma como um conjunto de objetos interage. O Mediator promove o acoplamento fraco ao evitar que os objetos se refiram uns aos outros explicitamente e permite variar suas interações independentemente.
- **Aplicabilidade**:
    - um conjunto de objetos se comunica de maneiras bem-definidas, porém complexas. As interdependências resultantes são desestruturadas e difíceis de entender.
    - a reutilização de um objeto é difícil porque ele referencia e se comunica com muitos outros objetos.
    - um comportamento que está distribuído entre várias classes deveria ser customizável, ou adaptável, sem excessiva especialização em subclasses


### Memento

- **Problema**: Sem violar o encapsulamento, capturar e externalizar um estado interno de um objeto, de maneira que o objeto possa ser restaurado para esse estado mais tarde.
- **Aplicabilidade**:
    - um instantâneo de (alguma porção do) estado de um objeto deve ser salvo de maneira que possa ser restaurado para esse estado mais tarde;
    - uma interface direta para obtenção do estado exporia detalhes de implementação e romperia o encapsulamento do objeto


### Observer

- **Problema**: Definir uma dependência um-para-muitos entre objetos, de maneira que quando um objeto muda de estado todos os seus dependentes são notificados e atualizados automaticamente.
- **Aplicabilidade**:
    - quando uma abstração tem dois aspectos, um dependente do outro. Encapsulando esses aspectos em objetos separados, permite-se variá-los e reutilizá-los independentemente;
    - quando uma mudança em um objeto exige mudanças em outros, e você não sabe quantos objetos necessitam ser mudados;
    - quando um objeto deveria ser capaz de notificar outros objetos sem fazer hipóteses, ou usar informações, sobre quem são esses objetos. Em outras palavras, você não quer que esses objetos sejam fortemente acoplados


### State

- **Problema**: Permite a um objeto alterar seu comportamento quando o seu estado interno muda. O objeto parecerá ter mudado sua classe.
- **Aplicabilidade**:
    - o comportamento de um objeto depende do seu estado e ele pode mudar seu comportamento em tempo de execução, dependendo desse estado;
    - operações têm comandos condicionais grandes, de várias alternativas, que dependem do estado do objeto. Esse estado é normalmente representado por uma ou mais constantes enumeradas. Freqüentemente, várias operações conterão essa mesma estrutura condicional. O padrão State coloca cada ramo do comando adicional em uma classe separada. Isto lhe permite tratar o estado do objeto como um objeto propriamente dito, que pode variar independentemente de outros objetos


### Strategy

- **Problema**:
    - Definir uma família de algoritmos, encapsular cada uma delas e torná-las intercambiáveis.
    - Strategy permite que o algoritmo varie independentemente dos clientes que o utilizam
- **Aplicabilidade**:
    - muitas classes relacionadas diferem somente no seu comportamento. As estratégias fornecem uma maneira de configurar uma classe com um dentre muitos comportamentos;
    - você necessita de variantes de um algoritmo. Por exemplo, pode definir algoritmos que refletem diferentes soluções de compromisso entre espaço/tempo. As estratégias podem ser usadas quando essas variantes são implementadas como uma hierarquia de classes de algoritmos
    - um algoritmo usa dados dos quais os clientes não deveriam ter conhecimento. Use o padrão Strategy para evitar a exposição das estruturas de dados complexas, específicas do algoritmo;
    - uma classe define muitos comportamentos, e estes aparecem em suas operações como múltiplos comandos condicionais da linguagem. Em vez de usar muitos comandos condicionais, mova os ramos condicionais relacionados para a sua própria classe Strategy.
- **Estrutural**
    - “Policy”
    - Define uma família ou tipo de classe de forma a reforçar, principalmente, os princípios **Open/Closed** e de **Liskov** do SOLID.
    - Uma única interface e uma ou mais classes concretas definem este padrão de projeto.


### Template Method

- **Problema**: Definir o esqueleto de um algoritmo em uma operação, postergando alguns passos para as subclasses. Template Method permite que subclasses redefinam certos passos de um algoritmo sem mudar a estrutura do mesmo.
- **Aplicabilidade**:
    - para implementar as partes invariantes de um algoritmo uma só vez e deixar para as subclasses a implementação do comportamento que pode variar.
    - quando o comportamento comum entre subclasses deve ser fatorado e concentrado numa classe comum para evitar a duplicação de código. Este é um bom exemplo de “refatorar para generalizar”, conforme descrito por Opdyke e Johnson. Primeiramente, você identifica as diferenças no código existente e então separa as diferenças em novas operações. Por fim, você substitui o código que apresentava as diferenças por um método-template que chama uma dessas novas operações.
    - para controlar extensões de subclasses. Você pode definir um método-template que chama operações “gancho” em pontos específicos, desta forma permitindo extensões somente nesses pontos.


### Visitor

- **Problema**: Representar uma operação a ser executada nos elementos de uma estrutura de objetos. Visitor permite definir uma nova operação sem mudar as classes dos elementos sobre os quais opera.
- **Aplicabilidade**:
    - uma estrutura de objetos contém muitas classes de objetos com interfaces que diferem e você deseja executar operações sobre esses objetos que dependem das suas classes concretas;
    - muitas operações distintas e não-relacionadas necessitam ser executadas sobre objetos de uma estrutura de objetos, e você deseja evitar “a poluição” das suas classes com essas operações. Visitor lhe permite manter juntas operações relacionadas, definindo-as em uma única classe. Quando a estrutura do objeto for compartilhada por muitas aplicações, use Visitor para por operações somente naquelas aplicações que as necessitam;
    - as classes que definem a estrutura do objeto raramente mudam, porém, você freqüentemente deseja definir novas operações sobre a estrutura. A mudança das classes da estrutura do objeto requer a redefinição da interface para todos os visitantes, o que é potencialmente oneroso. Se as classes da estrutura do objeto mudam com freqüência, provavelmente é melhor definir as operações nessas classes.



## Run this project

````shell script
composer install
./run_tests.sh
./run_send_sonar_local.sh

# fast testing
./run_tests.sh --fast
````
