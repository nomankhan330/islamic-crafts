<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AdminAndDesignTest extends TestCase
{
    use DatabaseMigrations;

    public function test_home_page_and_admin_panel(): void
    {
        $this->seed();

        // 1. Check Home
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Welcome to');
        $response->assertSee('Islamic Crafts');
        $response->assertSee('Resin Earrings');
        $response->assertSee('Resin Keychains');
        $response->assertSee('Nikkah Platter');
        $response->assertSee('Crochet Bag');

        // 2. Check Admin Login Page
        $loginRes = $this->get('/admin/login');
        $loginRes->assertStatus(200);
        $loginRes->assertSee('Admin Portal Access');

        // 3. Admin Dashboard
        $admin = User::where('email', 'admin@islamiccrafts.com')->first();
        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@islamiccrafts.com',
                'password' => bcrypt('admin123'),
                'is_admin' => true,
            ]);
        }

        $this->actingAs($admin);

        $dashRes = $this->get('/admin');
        $dashRes->assertStatus(200);
        $dashRes->assertSee('Overview & Analytics');

        $prodRes = $this->get('/admin/products');
        $prodRes->assertStatus(200);

        // Test editing product 1 by ID
        $editRes = $this->get('/admin/products/1/edit');
        $editRes->assertStatus(200);
        $editRes->assertSee('Edit:');

        $catRes = $this->get('/admin/categories');
        $catRes->assertStatus(200);

        $orderRes = $this->get('/admin/orders');
        $orderRes->assertStatus(200);
    }

    public function test_cart_ajax_toast_and_page_layout(): void
    {
        $this->seed();

        $product = Product::active()->first();
        $this->assertNotNull($product);

        // 1. Test AJAX Add to Cart (Must return JSON with product details and count, not redirect to cart page)
        $ajaxResponse = $this->postJson(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        $ajaxResponse->assertStatus(200);
        $ajaxResponse->assertJsonStructure([
            'success',
            'count',
            'total',
            'formatted_total',
            'message',
            'product' => [
                'id',
                'name',
                'price',
                'formatted_price',
                'image',
                'category',
                'quantity',
            ],
        ]);
        $ajaxResponse->assertJson([
            'success' => true,
            'count' => 2,
        ]);

        // 2. Test Standard Add to Cart (Must redirect BACK, not direct to /cart page)
        $stdResponse = $this->from(route('home'))->post(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        $stdResponse->assertRedirect(route('home'));

        // 3. Test Cart Page Layout
        $cartPage = $this->get(route('cart.index'));
        $cartPage->assertStatus(200);
        $cartPage->assertSee('Shopping Bag');
        $cartPage->assertSee('Order Summary');
        $cartPage->assertSee('Proceed to Checkout');
        $cartPage->assertSee('FREE Nationwide Delivery');
        $cartPage->assertSee($product->name);

        // 4. Test Checkout Page Layout
        $checkoutPage = $this->get(route('checkout'));
        $checkoutPage->assertStatus(200);
        $checkoutPage->assertSee('Delivery Address');
        $checkoutPage->assertSee('Payment Method');
        $checkoutPage->assertSee('Cash on Delivery');
        $checkoutPage->assertSee('Confirm & Place Order', false);

        // 5. Place Order & verify Success page
        $placeResponse = $this->post(route('order.place'), [
            'name' => 'Sara Ahmed',
            'phone' => '03001234567',
            'email' => 'sara@example.com',
            'city' => 'Lahore',
            'address' => 'House 12, Street 4, Gulberg III',
            'payment_method' => 'cod',
            'notes' => 'Please deliver in afternoon.',
        ]);

        $placeResponse->assertSessionHas('success');
        $order = \App\Models\Order::where('customer_phone', '03001234567')->first();
        $this->assertNotNull($order);
        $this->assertEquals('Lahore', $order->city);
        $placeResponse->assertRedirect(route('order.success', $order->id));

        $successPage = $this->get(route('order.success', $order->id));
        $successPage->assertStatus(200);
        $successPage->assertSee('JazakAllah Khair! Order Placed');
        $successPage->assertSee($order->order_number);
        $successPage->assertSee('Sara Ahmed');

        // 6. Test Product Details Page & Lightbox Slider Elements
        $detailRes = $this->get(route('products.show', $product->slug));
        $detailRes->assertStatus(200);
        $detailRes->assertSee($product->name);
        $detailRes->assertSee('Add to Shopping Bag');
        $detailRes->assertSee('Instant Order via WhatsApp');
        $detailRes->assertSee('Loved by Our Craft Family');
        $detailRes->assertSee('4.9');
        $detailRes->assertSee('Write a Review');
        $detailRes->assertSee('Share Your Experience');
        $detailRes->assertSee('product-lightbox-modal');
        $detailRes->assertSee('lightbox-main-img');
        foreach ($product->images as $img) {
            $this->assertNotEmpty($img->image_url);
            $this->assertNotEmpty($img->url);
            $detailRes->assertSee($img->image_url);
        }

        // 7. Test AJAX Review Submission
        $ajaxReviewRes = $this->postJson(route('products.review', $product->slug), [
            'customer_name' => 'Khadija Bibi',
            'rating' => 5,
            'review' => 'SubhanAllah! Beautiful handcrafted design and so nicely finished.',
        ]);
        $ajaxReviewRes->assertStatus(200);
        $ajaxReviewRes->assertJsonStructure([
            'success',
            'message',
            'review' => [
                'id',
                'customer_name',
                'rating',
                'review',
                'initials',
                'date',
            ],
            'total_reviews',
        ]);
        $ajaxReviewRes->assertJson([
            'success' => true,
            'review' => [
                'customer_name' => 'Khadija Bibi',
                'rating' => 5,
            ],
        ]);

        // 8. Test Multiple Images & Admin Image Management
        $images = $product->images;
        $this->assertGreaterThanOrEqual(1, $images->count());

        $admin = User::where('email', 'admin@islamiccrafts.com')->first();
        $this->actingAs($admin);

        // Edit page loads with gallery
        $adminEdit = $this->get(route('admin.products.edit', $product->id));
        $adminEdit->assertStatus(200);
        $adminEdit->assertSee('Product Gallery');
        $adminEdit->assertSee('Current Gallery Photos');

        // If multiple images exist, test make-primary on second image
        if ($images->count() > 1) {
            $secondImg = $images[1];
            $makePrimaryRes = $this->post(route('admin.products.images.make-primary', [$product->id, $secondImg->id]));
            $makePrimaryRes->assertRedirect();
            $this->assertTrue((bool) $secondImg->fresh()->is_primary);

            // Test deleting an image
            $deleteRes = $this->delete(route('admin.products.images.destroy', [$product->id, $secondImg->id]));
            $deleteRes->assertRedirect();
            $this->assertDatabaseMissing('product_images', ['id' => $secondImg->id]);
        }

        // 9. Test AJAX Newsletter Subscription
        $subRes = $this->postJson(route('subscribe'), [
            'email' => 'artisan.fan@gmail.com',
        ]);
        $subRes->assertStatus(200);
        $subRes->assertJson([
            'success' => true,
        ]);
        $this->assertDatabaseHas('subscribers', ['email' => 'artisan.fan@gmail.com']);

        // 10. Test Custom Orders Page & Submission
        $customPageRes = $this->get(route('custom-orders'));
        $customPageRes->assertStatus(200);
        $customPageRes->assertSee('Bespoke Custom Orders');
        $customPageRes->assertSee('Our 4-Step Bespoke Journey');
        $customPageRes->assertSee('Recent Bespoke Masterpieces');
        $customPageRes->assertSee('Custom Inquiry Form');
        $customPageRes->assertSee('Send Custom Request & Open WhatsApp Chat', false);

        // Test Custom Order submission
        $customSubmitRes = $this->post(route('custom-orders.store'), [
            'name' => 'Ayesha Khan',
            'phone' => '03001234567',
            'email' => 'ayesha@test.com',
            'category' => 'Resin Nikkah & Wedding Platter',
            'budget' => 'Rs. 4,000 - 7,000',
            'description' => 'Need personalized couple platter with gold calligraphy.',
        ]);
        $customSubmitRes->assertRedirect();
        $this->assertDatabaseHas('custom_order_requests', [
            'name' => 'Ayesha Khan',
            'phone' => '03001234567',
        ]);

        // Test AJAX Custom Order submission (Returns JSON with WhatsApp URL)
        $ajaxCustomRes = $this->postJson(route('custom-orders.store'), [
            'name' => 'Sana Tariq',
            'phone' => '03211234567',
            'email' => 'sana@test.com',
            'category' => 'Floral Collection',
            'budget' => 'Rs. 2,000 - 4,000',
            'description' => 'Need bridal pastel rose bouquet.',
        ]);
        $ajaxCustomRes->assertStatus(200);
        $ajaxCustomRes->assertJson([
            'success' => true,
        ]);
        $ajaxCustomRes->assertJsonStructure([
            'success',
            'message',
            'whatsapp_url',
            'inquiry' => ['id', 'name', 'category'],
        ]);

        // Test Admin Custom Order Show Page
        $newInquiryId = $ajaxCustomRes->json('inquiry.id');
        $adminInquiryRes = $this->get(route('admin.custom-orders.show', $newInquiryId));
        $adminInquiryRes->assertStatus(200);
        $adminInquiryRes->assertSee('Sana Tariq');
        $adminInquiryRes->assertSee('Floral Collection');
        $adminInquiryRes->assertSee('Chat on WhatsApp');
    }
}
