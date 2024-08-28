<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <img class="logo" src="assets/imgs/logo.jpeg"/>
        <h2 class="brand">Orange</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav  ms-auto">
           
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
                
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            
            <li class="nav-item">
              <a href="cart.html"><i class="fas fa-cart-shopping"></i></a>
            </li> 
            <li class="nav-item">
              <a href="account.html" <i class="fas fa-user"></i></a>
            </li> 
          </ul>
        </div>
      </nav>


      <!--Home-->
      <section id = "home">
        <div class = "container">
          <h5>NEW ARRIVALS</h5>
          <h1><span>Best Prices</span> This Season</h1>
          <p>Eshop offers the best products for the most affordabale prices</p>
          <button>Shop Now</button>
        </div>
      </section>

      <!--Brand-->
      <section id = "brand" class="container">
        <div class="row m-0">
          <img class = "img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpeg">
          <img class = "img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpeg">
          <img class = "img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpeg">
          <img class = "img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpeg">
        </div>
      </section>

      <!--New-->
      <section id = "new" class="w-100">
        <div class="row p-0 m-0">
          <!--One-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/1.jpeg"/>
            <div class="details">
              <h2>Extreamely Awesome Shoes</h2>
              <button class="test-uppercase">Shop Now</button>
            </div>
          </div>
          <!--Two-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/2.jpeg"/>
            <div class="details">
              <h2>Awesome Jacket</h2>
              <button class="test-uppercase">Shop Now</button>
            </div>
          </div>
          <!--Three-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/3.jpeg"/>
            <div class="details">
              <h2>50% OFF Watches</h2>
              <button class="test-uppercase">Shop Now</button>
            </div>
          </div>
        </div>
      </section>

      <!--Featured-->
      <section id = "featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Our Featured</h3>
          <hr class="mx-auto">
          <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
    <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
        <img class="img-fluid mb-3" src="assets/imgs/featured1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Sports Shoes</h5>
        <h4 class="p-price">$199.8</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
        <img class="img-fluid mb-3" src="assets/imgs/featured2.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Detroit Jacket</h5>
        <h4 class="p-price">$199.8</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
        <img class="img-fluid mb-3" src="assets/imgs/featured3.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Bomber Jacket</h5>
        <h4 class="p-price">$100</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
      <img class="img-fluid mb-3" src="assets/imgs/featured4.jpeg"/>
      <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Luxury Jacket</h5>
      <h4 class="p-price">$199.8</h4>
      <button class="buy-btn">Buy Now</button>
  </div>
</div>
      </section>

      <!--Banner-->
      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>MID SEASON'S SALE</h4>
          <h1>Autumn Collection <br>UP to 30% OFF</h1>
          <button class="test-uppercase">Shop Now</button>
        </div>
      </section>


      <!--Clothes-->
      <section>
        <section id = "featured class="my-5">
          <div class="container text-center mt-5 py-5">
            <h3>Dresses & Coats</h3>
            <hr class="mx-auto">
            <p>Here you can check out our amazing clothes</p>
          </div>
          <div class="row mx-auto container-fluid">
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
          <img class="img-fluid mb-3" src="assets/imgs/clothes1.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.8</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
  
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
          <img class="img-fluid mb-3" src="assets/imgs/clothes2.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Detroit Jacket</h5>
          <h4 class="p-price">$199.8</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
  
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
          <img class="img-fluid mb-3" src="assets/imgs/clothes3.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Bomber Jacket</h5>
          <h4 class="p-price">$100</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
  
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
        <img class="img-fluid mb-3" src="assets/imgs/clothes4.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Luxury Jacket</h5>
        <h4 class="p-price">$199.8</h4>
        <button class="buy-btn">Buy Now</button>
    </div>
  </div>
        </section>
      </section>

      <!--Watches-->
      <section>
        <section id = "watches" class="my-5">
          <div class="container text-center mt-5 py-5">
            <h3>Best Watches</h3>
            <hr class="mx-auto">
            <p>Check out unique watches</p>
          </div>
          <div class="row mx-auto container-fluid">
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
          <img class="img-fluid mb-3" src="assets/imgs/watches1.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.8</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
  
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
          <img class="img-fluid mb-3" src="assets/imgs/watches2.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Detroit Jacket</h5>
          <h4 class="p-price">$199.8</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
  
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
          <img class="img-fluid mb-3" src="assets/imgs/watches3.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Bomber Jacket</h5>
          <h4 class="p-price">$100</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
  
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
        <img class="img-fluid mb-3" src="assets/imgs/watches4.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Luxury Jacket</h5>
        <h4 class="p-price">$199.8</h4>
        <button class="buy-btn">Buy Now</button>
    </div>
  </div>
        </section>
      </section>

      <!--Shoes-->
      <section>
        <section id = "shoes" class="my-5">
          <div class="container text-center mt-5 py-5">
            <h3>Shoes</h3>
            <hr class="mx-auto">
            <p>Here you can check out our amazing shoes</p>
          </div>
          <div class="row mx-auto container-fluid">
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
          <img class="img-fluid mb-3" src="assets/imgs/shoes1.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.8</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
  
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
          <img class="img-fluid mb-3" src="assets/imgs/shoes2.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Detroit Jacket</h5>
          <h4 class="p-price">$199.8</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
  
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
          <img class="img-fluid mb-3" src="assets/imgs/shoes3.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Bomber Jacket</h5>
          <h4 class="p-price">$100</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
  
      <div class="product text-center col-12 col-sm-6 col-md-4 col-lg-3"> 
        <img class="img-fluid mb-3" src="assets/imgs/shoes4.jpg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Luxury Jacket</h5>
        <h4 class="p-price">$199.8</h4>
        <button class="buy-btn">Buy Now</button>
    </div>
  </div>
        </section>
      </section>

      <!--Footer-->
      <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="assets/imgs/logo.jpeg"/>
            <p class="pt-3">We provide the best products for the most affordabale prices</p>
          </div>
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="text-uppercase">
              <li><a href="#">men</a></li>
              <li><a href="#">women</a></li>
              <li><a href="#">boys</a></li>
              <li><a href="#">girls</a></li>
              <li><a href="#">new arrivals</a></li>
              <li><a href="#">clothes</a></li>
            </ul>
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <div>
              <h6 class="text-uppercase">Address</h6>
              <p>Km10, Đường Nguyễn Trãi, Q.Hà Đông, Hà Nội</p>
            </div>
            <div>
              <h6 class="text-uppercase">Phone</h6>
              <p>123 456 789</p>
            </div>
            <div>
              <h6 class="text-uppercase">Email</h6>
              <p>info@ptit.edu.vn</p>
            </div>
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Instagram</h5>
            <div class="row">
              <img src="assets/imgs/featured1.jpeg" class="img-fluid w-25 h-100 m-2"/>
              <img src="assets/imgs/featured2.jpeg" class="img-fluid w-25 h-100 m-2"/>
              <img src="assets/imgs/featured3.jpeg" class="img-fluid w-25 h-100 m-2"/>
              <img src="assets/imgs/featured4.jpeg" class="img-fluid w-25 h-100 m-2"/>
              <img src="assets/imgs/clothes1.jpeg" class="img-fluid w-25 h-100 m-2"/>
            </div>
          </div>
        </div>



        <div class="copyright mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <img src="assets/imgs/payment.jpeg"/>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-2 text-nowrap">
              <p>eCommerce @ 2025 All Right Reserved</p>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-x"></i></a> 
          </div>
          </div>
        </div>

      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body> 
</html>
