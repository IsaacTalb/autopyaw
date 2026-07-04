<?php

namespace Tests\Feature;

use App\Models\Business;
use App\Models\Faq;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BusinessTenancyTest extends TestCase
{
    use RefreshDatabase;

    public function test_business_owned_models_are_scoped_to_authenticated_users_business(): void
    {
        [$firstBusiness, $firstUser] = $this->businessAndUser('First Shop', 'first@example.com');
        [$secondBusiness] = $this->businessAndUser('Second Shop', 'second@example.com');

        Product::withoutGlobalScopes()->create([
            'business_id' => $firstBusiness->id,
            'name' => 'Visible Product',
            'slug' => 'visible-product',
            'price' => 1000,
            'stock' => 5,
        ]);

        Product::withoutGlobalScopes()->create([
            'business_id' => $secondBusiness->id,
            'name' => 'Hidden Product',
            'slug' => 'hidden-product',
            'price' => 2000,
            'stock' => 10,
        ]);

        $this->actingAs($firstUser);

        $this->assertSame(['Visible Product'], Product::query()->pluck('name')->all());
    }

    public function test_business_owned_models_receive_authenticated_business_id_on_create(): void
    {
        [$business, $user] = $this->businessAndUser('Knowledge Shop', 'knowledge@example.com');

        $this->actingAs($user);

        $faq = Faq::create([
            'question' => 'Delivery ရှိလား',
            'answer' => 'ရန်ကုန်မြို့တွင်း ပို့ဆောင်ပေးပါသည်။',
        ]);

        $this->assertSame($business->id, $faq->business_id);
    }

    public function test_product_slugs_are_unique_per_business_not_globally(): void
    {
        [$firstBusiness] = $this->businessAndUser('Alpha Shop', 'alpha@example.com');
        [$secondBusiness] = $this->businessAndUser('Beta Shop', 'beta@example.com');

        Product::withoutGlobalScopes()->create([
            'business_id' => $firstBusiness->id,
            'name' => 'Shared Slug Alpha',
            'slug' => 'shared-slug',
            'price' => 1000,
            'stock' => 5,
        ]);

        Product::withoutGlobalScopes()->create([
            'business_id' => $secondBusiness->id,
            'name' => 'Shared Slug Beta',
            'slug' => 'shared-slug',
            'price' => 2000,
            'stock' => 10,
        ]);

        $this->assertSame(2, Product::withoutGlobalScopes()->where('slug', 'shared-slug')->count());
    }

    /**
     * @return array{Business, User}
     */
    private function businessAndUser(string $businessName, string $email): array
    {
        $business = Business::create([
            'name' => $businessName,
            'slug' => str($businessName)->slug()->toString(),
            'subscription_plan' => 'free',
            'status' => 'active',
        ]);

        $user = User::create([
            'name' => $businessName.' Owner',
            'email' => $email,
            'password' => bcrypt('password'),
            'business_id' => $business->id,
        ]);

        return [$business, $user];
    }
}
