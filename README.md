# Anders t.o.v. de training

Voor als je tijd hebt om commentaar te leveren op onderstaande om een discussie te starten over de beste mogelijkheden. Zelfs als het om een voorkeur gaat.

## Naamgeving

De module heet Academy**Blog**Core. Vandaar de naam **Post**Interface i.p.v. **BlogPost**Interface. De modulenaam geeft de context al weer.

De **PostInterace** is dan wel te vinden in **Blog** mappen;
`Api/Data/BlogPostInterface` -->
`Api/Data/Blog/PostInterface`

## PostInterface

De interface bevat de keys van kolommen. Zo kunnen modules die gebruik maken van de **PostInterface** (bovenliggende module) deze keys gebruiken.

Wanneer een key wordt aangepast zal automatisch de key van bovenliggende module aangepast worden. Dit geldt ook voor de getters en setters.

Zo verklein je de kans dat een module bij een aanpassing omvalt. Mits er geen key weggehaald wordt, kunnen er vanuit hier met een `setup:upgrade` geen problemen optreden met bovenliggende modules. 

Bij wijzigingen hoeft onderstaande maar op één plek aangepast te worden.

```php
interface PostInterface extends ReadablePostInterface, MutablePostInterface
{
    public const TITLE = 'title';
    public const BODY = 'body';
    public const URL_KEY = 'url_key';
}
```

```php
public function getTitle(): string
{
    $this->getData(PostInterface::TITLE);
}

public function setTitle(string $title): void
{
    $this->setData(PostInterface::TITLE, $title);
}
```

**AcademyBlogCli**/Console/Command/Blog/Post/PostCreateCommandInterface
```php
public function configure()
{
    $this->setName('blog:post:create')
        ->setDescription('Create a blog post')
        ->addOption(PostInterface::TITLE,   't', InputOption::VALUE_REQUIRED, 'Blog Post Title')
        ->addOption(PostInterface::BODY,    'b', InputOption::VALUE_REQUIRED, 'Blog Post Body')
        ->addOption(PostInterface::URL_KEY, 'u', InputOption::VALUE_OPTIONAL, 'Blog Post Url Key');
}
```

## Read/Write PostInterface

De **PostInterface** is gescheiden in twee verschillende interfaces, maar bevat nog steeds dezelfde methodes door deze te extenden.

- ReadablePostInterface
- MuteablePostInterface *(of eventueel WriteablePostInterface)*

Een collectie van Posts ophalen kan door de volgende Repository Interface aan te roepen.

```php
interface PostCollectionRepositoryInterface
{
    /** @return ReadablePostInterface[] */ // Read Methods
    public function getItems(): array;
}
```

Met autocompletion binnen PHPStorm worden nu alleen de getters weergegeven, zoals bijvoorbeeld in de **AcademyBlogCli** module.

```php
foreach ($this->postCollectionRepository->getItems() as $post) {
    $output->writeln($post->getTitle());    // Visible
    $output->writeln($post->getUrlKey());   // Visible
    $output->writeln($post->getBody());     // Visible
    
    $output->writeln($post->setBody());     // Not visible
}
```

## Post & PostCollection

Nooit, zo niet, zelden wordt in één Klasse zowel een enkele Model als collectie van Models opgehaald. Vandaar de volgende repositories, met uiteraard bijbehorende implementaties;

- PostCollectionRepositoryInterface
- PostRepositoryInterface
