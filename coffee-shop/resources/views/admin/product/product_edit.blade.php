<x-admin-layout>
    @section('title', 'Product')
    @php
        $categoryOptions = $category->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        });
    @endphp

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('product') }}">{{ __('Product') }}</a>/{{ __('Chỉnh sửa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('product_update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <x-input-label for="name" :value="__('Tên sản phẩm')" />
                            <x-text-input value="{{ $product->name }}" id="name" name="name"
                                class="block mt-1 w-full required-field" type="text" required
                                placeholder="Nhập tên sản phẩm" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="price" :value="__('Giá sản phẩm')" />
                            <x-text-input value="{{ $product->price }}" id="price" name="price"
                                class="block mt-1 w-full required-field" type="number" inputmode="numberic"
                                min="0" max="10000000" step="100" required placeholder="Nhập giá sản phẩm" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="price" :value="__('Danh mục sản phẩm')" />
                            <x-selector-input id="category_id" name="category_id"
                                class="block mt-1 w-full required-field" :options="$categoryOptions->toArray()" :selected="$product->category_id" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="description" :value="__('Mô tả sản phẩm')" />
                            <x-textarea-input id="description" name="description" class="block mt-1 w-full"
                                type="text" rows="8" placeholder="Nhập mô tả">{{$product->description}}</x-textarea-input>
                        </div>
                        <div class="mb-3">
                            <x-input-label for="status" :value="__('Tình trạng')" />
                            <x-selector-input id="status" name="status" class="block mt-1 w-full required-field"
                                :disabled="false" :options="['0' => 'Ngừng bán', '1' => 'Đang bán']" :selected="$product->status" />
                        </div>
                        <div class="mb-3">
                            <x-input-label :value="__('Hình ảnh sản phẩm')" />
                            <img src="{{ asset('assets/img/product/' . $product->image) }}" alt="Hình ảnh" width=300px>
                        </div>
                        <div class="mb-3">
                            <x-input-label for="image" :value="__('Thay hình ảnh mới')" />
                            <input type="file" name='image' id="image" value="{{ $product->image }}"
                                class="form-control" accept=".jpeg, .jpg, .png, .gif">
                            <div id="image-error" class="text-danger"></div>
                        </div>
                        <x-primary-button class="save-btn">Lưu</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('page-script')
        <script src="{{ asset('assets/js/product-manage.js') }}"></script>
    @endsection
</x-admin-layout>
