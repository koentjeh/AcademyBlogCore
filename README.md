# Anders t.o.v. de training

Voor als je tijd hebt om commentaar te leveren op onderstaande om een discussie te starten over de beste mogelijkheden. Zelfs als het om een voorkeur gaat.

## Naamgeving

De module heet Academy**Blog**Core. Vandaar de naam **Post**Interface i.p.v. **BlogPost**Interface. De modulenaam geeft de context al weer.

De **PostInterace** is dan wel te vinden in **Blog** mappen;
`Api/Data/BlogPostInterface` -->
`Api/Data/Blog/PostInterface`

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
