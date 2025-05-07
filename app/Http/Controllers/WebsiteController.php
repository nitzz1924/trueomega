<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use App\Models\Blog;
use App\Models\CommisionList;
use App\Models\Commission;
use App\Models\Country;
use App\Models\Master;
use App\Models\MyCart;
use App\Models\Order;
use App\Models\PolicyPage;
use App\Models\RegisterUser;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use Exception;
use Auth;
class WebsiteController extends Controller
{
    public function homepage()
    {
        $websitedata = WebsiteSetting::first();
        // dd($websitedata);
        return view('WebsitePages.homepage', compact('websitedata'));
    }
    public function aboutpage()
    {
        return view('WebsitePages.aboutpage');
    }
    public function contactpage()
    {
        return view('WebsitePages.contactus');
    }
    public function blogdetails($id)
    {
        $blogdata = Blog::find($id);
        $blogname = $blogdata->blogname;
        return view('WebsitePages.blogdetails', compact('blogdata', 'blogname'));
    }
    public function policies(Request $request)
    {
        $pagname = $request->query('p');
        $privacydata = PolicyPage::where('pagename', $pagname)->first();
        return view('WebsitePages.policies', compact('privacydata', 'pagname'));
    }
    public function productdetails($id)
    {
        $productdata = AllProduct::find($id);
        $relatedproducts = AllProduct::where('category', $productdata->category)->where('id', '!=', $id)->get();
        $productreviews = Review::where('productid', $id)->get();
        $productreviewscnt = Review::where('productid', $id)->count();
        return view('WebsitePages.productDetails', compact('productdata', 'relatedproducts', 'productreviews', 'productreviewscnt'));
    }
    public function shop()
    {
        $featuredproducts = AllProduct::orderBy('created_at', 'desc')
            ->where('productstatus', '=', 'published')
            ->paginate(6)
            ->through(function ($product) { // Use `through()` instead of `map()`
                $product->category_count = AllProduct::where('category', $product->category)
                    ->where('productstatus', '=', 'published')
                    ->count();
                return $product;
            });

        return view('WebsitePages.shop', compact('featuredproducts'));
    }
    public function shopcategoryfilter(Request $request)
    {
        $category = $request->input('category');
        $products = AllProduct::orderBy('created_at', 'desc')
            ->where('category', $category)
            ->where('productstatus', '=', 'published')
            ->paginate(6);
        return response()->json($products);
    }
    public function sortByPriceFilter(Request $request)
    {
        $filtername = $request->input('filtername');
        if ($filtername === 'lowtohigh') {
            $products = AllProduct::orderByRaw('CAST(regularprice AS UNSIGNED) ASC')    //This will cast the regularprice as unsigned integer and then sort it
                ->where('productstatus', '=', 'published')
                ->paginate(6);
        } elseif ($filtername === 'hightolow') {
            $products = AllProduct::orderByRaw('CAST(regularprice AS UNSIGNED) DESC')
                ->where('productstatus', '=', 'published')
                ->paginate(6);
        }
        return response()->json($products);
    }
    public function blogs()
    {
        $blogcategories = Master::where('type', 'Blog Categories')->get();
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(6);
        return view('WebsitePages.blogs', compact('blogs', 'blogcategories'));
    }
    public function giveProductReview(Request $request)
    {
        try {
            $data = Review::create([
                'ratings' => $request->input('rating'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'reviewtxt' => $request->input('reviewtxt'),
                'productid' => $request->input('productid'),
                'userid' => $request->input('userid'),
            ]);
            // dd($data);
            return back()->with('success', "Your Review has been added.!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function addtoCart(Request $request)
    {
        $loggedinUser = Auth::guard('customer')->user();
        try {
            $data = MyCart::create([
                'userid' => $loggedinUser->id ?? '',
                'productid' => $request->input('productid'),
                'productname' => $request->input('productname'),
                'productimage' => $request->input('productimage'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'status' => 'addedtocart',
            ]);
            return response()->json([
                'success' => true,
                'message' => "Product added to cart successfully!",
                'cart' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Failed to add product to cart.",
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function mycart()
    {
        $mycartproducts = MyCart::where('userid', Auth::guard('customer')->user()->id)
            ->where('status', 'addedtocart')->get();
        return view('WebsitePages.cart', compact('mycartproducts'));
    }
    public function removeFromCart()
    {
        $cartid = request()->input('cartid');
        try {
            MyCart::where('id', $cartid)->delete();
            return response()->json([
                'success' => true,
                'message' => "Product removed from cart successfully!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Failed to remove product from cart.",
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function updateQuantity()
    {
        $cartid = request()->input('cartid');
        $quantity = request()->input('quantity');
        try {
            MyCart::where('id', $cartid)->update([
                'quantity' => $quantity,
            ]);
            return response()->json([
                'success' => true,
                'message' => "Updated"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Failed to update",
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function checkout()
    {
        $loggedinuser = Auth::guard('customer')->user();
        $mycartproducts = MyCart::where('userid', $loggedinuser->id)->get();
        $countries = Country::pluck('nicename');
        return view('WebsitePages.checkout', compact('countries', 'mycartproducts'));
    }
    public function completeCheckout(Request $request)
    {
        $loggedinuser = Auth::guard('customer')->user();
        $billingData = [];
        $shippingData = [];

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'b-')) {
                $billingData[$key] = $value;
            } elseif (str_starts_with($key, 's-')) {
                $shippingData[$key] = $value;
            }
        }

        try {
            // Create the order
            $data = Order::create([
                'userid' => $loggedinuser->id ?? '',
                'billing_address' => json_encode($billingData) ?? '',
                'shipping_address' => json_encode($shippingData) ?? '',
                'grandtotal' => $request->input('grandtotal'),
                'products' => $request->input('products'),
                'orderstatus' => 'processing',
            ]);

            // Update cart items status to purchased
            MyCart::where('userid', $loggedinuser->id)->update(['status' => 'purchased']);

            // Update user's commission status
            RegisterUser::where('id', $loggedinuser->id)->update(['commission_status' => 'eligible']);

            // Dynamically fetch commission percentages from commission_lists table
            $commissionLevels = CommisionList::where('commission_type', 'Single')
                ->pluck('commission_percentage', 'level')
                ->toArray();

            $currentUser = $loggedinuser;
            $levelCount = 1;

            while ($currentUser) {
                $parentUser = RegisterUser::where('id', $currentUser->sponserid)->first();

                if ($parentUser) {
                    $level = $levelCount;

                    // Handle Grouped Commission for Level 5 and Beyond
                    if ($level >= 5) {
                        $commissionType = CommisionList::where('level', $level)
                            ->value('commission_type');

                        if ($commissionType === 'Grouped') {
                            // Get all descendants recursively for turnover calculation
                            $descendants = $this->getAllDescendants($currentUser->id);

                            // Include siblings for turnover calculation
                            $siblings = RegisterUser::where('sponserid', $parentUser->id)
                                ->pluck('id')
                                ->toArray();

                            // Merge current user, siblings, and descendants
                            $allGroupUserIds = array_unique(array_merge([$currentUser->id], $siblings, $descendants));

                            // Calculate total turnover
                            $totalTurnover = Order::whereIn('userid', $allGroupUserIds)->sum('grandtotal');

                            // Determine commission percentage
                            $groupCommissionPercentage = ($totalTurnover > 1000) ? 7 : 0;

                            // Only the immediate parent receives the commission
                            Commission::create([
                                'user_id' => $loggedinuser->id,
                                'parent_id' => $parentUser->id,
                                'comm_amount' => $request->input('grandtotal') * ($groupCommissionPercentage / 100),
                                'order_amount' => $request->input('grandtotal'),
                                'comm_month' => now()->format('F'),
                                'comm_percentage' => $groupCommissionPercentage,
                            ]);
                        }
                    } else {
                        // Handle Single Commission for Level 1 to 4
                        $percentage = $commissionLevels[$level] ?? 0;

                        Commission::create([
                            'user_id' => $loggedinuser->id,
                            'parent_id' => $parentUser->id,
                            'comm_amount' => $request->input('grandtotal') * ($percentage / 100),
                            'order_amount' => $request->input('grandtotal'),
                            'comm_month' => now()->format('F'),
                            'comm_percentage' => $percentage,
                        ]);
                    }

                    $currentUser = $parentUser;
                    $levelCount++;
                } else {
                    break;
                }
            }

            return response()->json([
                'success' => true,
                'message' => "Order placed successfully!",
                'cart' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Failed to complete checkout.",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Recursively get all descendants of a given user ID
     */
    private function getAllDescendants($userId)
    {
        $descendants = [];
        $children = RegisterUser::where('sponserid', $userId)->pluck('id')->toArray();

        foreach ($children as $childId) {
            $descendants[] = $childId;
            // Recursively add grandchildren and further descendants
            $descendants = array_merge($descendants, $this->getAllDescendants($childId));
        }

        return $descendants;
    }


    public function confirmorder()
    {
        $loggedinuser = Auth::guard('customer')->user();
        $mycartproducts = MyCart::where('userid', $loggedinuser->id)->get();
        return view('WebsitePages.orderconfirmation', compact('mycartproducts'));
    }
}




