# tolkam/asset-twig

Twig integration for tolkam/asset package.

## Documentation

The code is rather self-explanatory and API is intended to be as simple as possible. Please, read the sources/Docblock if you have any questions. See [Usage](#usage) for quick start.

## Usage

````php
use Tolkam\Asset\AssetManager;
use Tolkam\Asset\Group\UriGroup;
use Tolkam\Asset\Twig\AssetExtension;
use Tolkam\Asset\VersionStrategy\SharedVersionStrategy;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

$assetManager = new AssetManager(
    new UriGroup(
        '//example.com/my/assets/path/',
        new SharedVersionStrategy('v2')
    )
);

$twig = new Environment(new ArrayLoader([
    'myTemplate.twig' => 'Asset URL is "{{ asset("image.jpg") }}"',
]));

$twig->addExtension(new AssetExtension($assetManager));

echo $twig->render('myTemplate.twig');
````

## License

Proprietary / Unlicensed 🤷
