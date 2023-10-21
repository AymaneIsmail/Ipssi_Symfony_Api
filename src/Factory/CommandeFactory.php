<?php

namespace App\Factory;

use App\Entity\Commande;
use App\Repository\CommandeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Commande>
 *
 * @method        Commande|Proxy create(array|callable $attributes = [])
 * @method static Commande|Proxy createOne(array $attributes = [])
 * @method static Commande|Proxy find(object|array|mixed $criteria)
 * @method static Commande|Proxy findOrCreate(array $attributes)
 * @method static Commande|Proxy first(string $sortedField = 'id')
 * @method static Commande|Proxy last(string $sortedField = 'id')
 * @method static Commande|Proxy random(array $attributes = [])
 * @method static Commande|Proxy randomOrCreate(array $attributes = [])
 * @method static CommandeRepository|RepositoryProxy repository()
 * @method static Commande[]|Proxy[] all()
 * @method static Commande[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Commande[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Commande[]|Proxy[] findBy(array $attributes)
 * @method static Commande[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Commande[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class CommandeFactory extends ModelFactory
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
            'DateCommande' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'utilisateur' => UtilisateurFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Commande $commande): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Commande::class;
    }
}
