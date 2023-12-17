<x-admin-layout>
    @section('title', 'Product')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Thông tin Sản phẩm') }}
                    <form action="{{ route('product') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="search"
                                value={{ $keyword }}>
                            <select id="category" name="category_id">
                                <option value="">Tất cả</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $categoryId ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <x-primary-button>Tìm</x-primary-button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Mô tả sản phẩm</th>
                                <th scope="col">Danh mục sản phẩm</th>
                                <th scope="col">Hiển thị</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col" colspan="2">
                                    Thao tác
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->isEmpty())
                                <tr>
                                    <td colspan="8">
                                        @if (isset($keyword) || $categoryId)
                                            Không có sản phẩm phù hợp với tìm kiếm của bạn.
                                        @else
                                            Không có sản phẩm nào trong kho.
                                        @endif
                                    </td>
                                </tr>
                            @else
                                <div id="product-list">
                                    @include('admin.product.product_list', ['products' => $products])
                                </div>
                            @endif
                        </tbody>
                    </table>
                    <a href="{{ route('product_create') }}"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Thêm
                        sản phẩm mới</a>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>


</x-admin-layout>
