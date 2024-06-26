<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showFavorites()
{
    $favoriteProducts = Product::where('is_favorite', true)->get();
    return view('favorites.index', compact('favoriteProducts'));
}
public function toggleFavorite(Product $product)
{
    // Đảo ngược trạng thái yêu thích của sản phẩm
    $product->is_favorite = !$product->is_favorite;
    $product->save();

    return response()->json(['success' => true]);
}

}
