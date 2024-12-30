@extends ('layouts.app')
 
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Menu Dine-In</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">


    <!-- Include Bootstrap -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }
        .card:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .btn-custom {
            border-radius: 20px;
            padding: 12px 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }
        .btn-group .btn {
            margin: 0 5px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Menu Restoran</h2>

        <!-- Loop Menu -->
        <div class="row gy-4 mt-4">
            @foreach($menus as $menu)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/'.$menu->gambar_menu) }}" class="card-img-top" alt="{{ $menu->nama_menu }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                            <p class="card-text">{{ $menu->deskripsi }}</p>
                            <p id="price-{{ $menu->id }}" class="card-text">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>

                            <div class="d-flex align-items-center">
                                <button class="btn btn-success" onclick="updateQuantity('add', {{ $menu->id }})">
                                    <i class="bi bi-plus-circle"></i> 
                                </button>
                                <span id="quantity-{{ $menu->id }}" class="mx-2">0</span>
                                <button class="btn btn-danger " onclick="updateQuantity('subtract', {{ $menu->id }})">
                                    <i class="bi bi-dash-circle"></i> 
                                </button>
                            </div>

                            <!-- Menampilkan total harga untuk setiap item -->
                            <p id="total-price-{{ $menu->id }}" class="mt-2">Rp 0</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 text-center">
            <button class="btn btn-primary mt-2 btn-custom" onclick="addToCart({{ $menu->id }})">
                <i class="bi bi-cart-plus"></i> Simpan ke Keranjang
            </button>
        </div>

        <!-- Tombol Checkout -->
        <div class="mt-4 text-center">
            <a href="{{ route('pemesanan.create', ['id' => $restoran->id_pemilik]) }}" class="btn btn-warning btn-custom">
                <i class="bi bi-bag-check"></i> Keranjang
            </a>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        let cart = {};

        // Fungsi untuk update jumlah menu yang dipilih
        function updateQuantity(action, menuId) {
            let quantityElement = document.getElementById('quantity-' + menuId);
            let currentQuantity = parseInt(quantityElement.innerText);
            
            // Menambah atau mengurangi quantity
            if (action === 'add') {
                currentQuantity++;
            } else if (action === 'subtract' && currentQuantity > 0) {
                currentQuantity--;
            }

            // Update jumlah di UI
            quantityElement.innerText = currentQuantity;
            cart[menuId] = currentQuantity;
            updateTotalPrice(menuId, currentQuantity);

            // Kirimkan perubahan quantity ke server untuk update session
            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ menu_id: menuId, quantity: currentQuantity })
            })
            .then(response => response.json())
            .then(data => {
                // Update total harga setelah perubahan quantity
                document.getElementById('total').innerText = 'Rp ' + data.total.toLocaleString();
            })
            .catch(error => console.error('Error:', error));
        }

        // Fungsi untuk menambahkan menu ke keranjang
        function addToCart(menuId) {
            let quantity = cart[menuId] || 0;
            if (quantity > 0) {
                // Kirim data ke server untuk disimpan
                fetch('{{ route('cart.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ menu_id: menuId, quantity: quantity })
                })
                .then(response => response.json())
                .then(data => {
                    alert('Menu berhasil disimpan ke keranjang');
                    updateCartTotal(data.total); // Update total harga di halaman
                })
            }
        }

        // Fungsi untuk update total harga di halaman
        function updateTotalPrice(menuId, quantity) {
            let price = parseInt(document.getElementById('price-' + menuId).innerText.replace(/[^0-9]/g, '')); // Ambil harga menu
            let totalPriceElement = document.getElementById('total-price-' + menuId);

            let totalPrice = price * quantity;
            totalPriceElement.innerText = "Rp " + totalPrice.toLocaleString(); // Menampilkan total harga untuk item ini
        }

        // Fungsi untuk update total harga di keranjang
        function updateCartTotal(total) {
            let totalElement = document.getElementById('cart-total');
            totalElement.innerText = "Total: Rp " + total.toLocaleString(); // Menampilkan total keseluruhan
        }
    </script>
</body>

</html>
