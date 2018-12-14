<?php declare(strict_types=1);

namespace Tolkam\Asset\Twig;

use Tolkam\Asset\AssetManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AssetExtension extends AbstractExtension
{
    /**
     * @var AssetManager
     */
    protected $assetManager;
    
    /**
     * @param AssetManager $assetManager
     */
    public function __construct(AssetManager $assetManager)
    {
        $this->assetManager = $assetManager;
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'asset';
    }
    
    /**
     * @inheritDoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('asset', [$this, 'resolveAsset']),
        ];
    }
    
    /**
     * Resolves asset
     *
     * @param string      $asset
     * @param string|null $groupName
     *
     * @return false|string
     */
    public function resolveAsset(string $asset, string $groupName = null)
    {
        return $this->assetManager->resolve($asset, $groupName);
    }
}
