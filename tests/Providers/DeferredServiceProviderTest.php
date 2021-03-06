<?php namespace Arcanedev\LaravelMarkdown\Tests\Providers;

use Arcanedev\LaravelMarkdown\Providers\DeferredServicesProvider;
use Arcanedev\LaravelMarkdown\Tests\TestCase;

/**
 * Class     DeferredServiceProviderTest
 *
 * @package  Arcanedev\LaravelMarkdown\Tests\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DeferredServiceProviderTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\LaravelMarkdown\Providers\DeferredServicesProvider  */
    private $provider;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(DeferredServicesProvider::class);
    }

    public function tearDown(): void
    {
        unset($this->provider);

        parent::tearDown();
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Illuminate\Support\ServiceProvider::class,
            \Arcanedev\Support\Providers\ServiceProvider::class,
            \Arcanedev\LaravelMarkdown\Providers\DeferredServicesProvider::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->provider);
        }
    }

    /** @test */
    public function it_can_provides()
    {
        $expected = [
            \Arcanedev\LaravelMarkdown\Contracts\Parser::class,
        ];

        static::assertEquals($expected, $this->provider->provides());
    }
}
