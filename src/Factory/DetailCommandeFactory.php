<?php

namespace App\Factory;

use App\Entity\DetailCommande;
use App\Repository\DetailCommandeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<DetailCommande>
 *
 * @method        DetailCommande|Proxy create(array|callable $attributes = [])
 * @method static DetailCommande|Proxy createOne(array $attributes = [])
 * @method static DetailCommande|Proxy find(object|array|mixed $criteria)
 * @method static DetailCommande|Proxy findOrCreate(array $attributes)
 * @method static DetailCommande|Proxy first(string $sortedField = 'id')
 * @method static DetailCommande|Proxy last(string $sortedField = 'id')
 * @method static DetailCommande|Proxy random(array $attributes = [])
 * @method static DetailCommande|Proxy randomOrCreate(array $attributes = [])
 * @method static DetailCommandeRepository|RepositoryProxy repository()
 * @method static DetailCommande[]|Proxy[] all()
 * @method static DetailCommande[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static DetailCommande[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static DetailCommande[]|Proxy[] findBy(array $attributes)
 * @method static DetailCommande[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static DetailCommande[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class DetailCommandeFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'quantite' => self::faker()->randomNumber(),
            'commande' => CommandeFactory::new(),
            'produit' => ProduitFactory::new()
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(DetailCommande $detailCommande): void {})
        ;
    }

    protected static function getClass(): string
    {
        return DetailCommande::class;
    }
}
