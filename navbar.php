<!DOCTYPE html>
<?php

session_start();
?>

<style>
  #mymain
  {
    display:none;
  }

  @media screen and (max-width: 1100px) {
  /* styles for landscape orientation */
  #mymain {
      display:block;
    }
  }

</style>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Emad E-Commerce Website</title>

    <!--
    - favicon
  -->
    <link
      rel="shortcut icon"
      href="./assets/images/logo/favicon.ico"
      type="image/x-icon"
    />

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style-prefix.css" />

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <div class="overlay" data-overlay></div>

    <!--
    - MODAL
  -->

    <div class="modal" style="display:none;" data-modal>
      <div class="modal-close-overlay" data-modal-overlay ></div>

      <div class="modal-content">
        <button class="modal-close-btn" data-modal-close>
          <ion-icon name="close-outline"></ion-icon>
        </button>

        

        

          
          </form>
        </div>
      </div>
    </div>

    <!--
    - NOTIFICATION TOAST
  -->

    <div class="notification-toast" style="display:none;" data-toast>
      <button class="toast-close-btn" data-toast-close>
        <ion-icon name="close-outline"></ion-icon>
      </button>

      

      
    </div>

    <!--
    - HEADER
  -->

    <header>
      <div class="header-top">
        <div class="container">
          <ul class="header-social-container">
            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>
          </ul>

          <div class="header-alert-news">
            <p>
              <b>Free Shipping</b>
              This Week Order Over - $55
            </p>
          </div>

          <div class="header-top-actions">
            <select name="currency">
              <option value="usd">USD &dollar;</option>
              <option value="eur">EUR &euro;</option>
            </select>

            <select name="language">
              <option value="en-US">English</option>
              <option value="es-ES">Espa&ntilde;ol</option>
              <option value="fr">Fran&ccedil;ais</option>
            </select>
          </div>
        </div>
      </div>

      <div class="header-main">
        <div class="container">
          <a href="index.php" class="header-logo">
            <img
              src="./assets/images/logo/logo.svg"
              alt="Anon's logo"
              width="120"
              height="36"
            />
          </a>

          <div class="header-search-container">
            <input
              type="search"
              name="search"
              class="search-field"
              placeholder="Enter your product name..."
            />

            <button class="search-btn">
              <ion-icon name="search-outline"></ion-icon>
            </button>
          </div>
          
          <div class="header-user-actions">
            <?php
            if (isset($_SESSION['email']))
            {
              echo "<a href='profile.php' class='action-btn'>
              <ion-icon name='person-outline'></ion-icon>
            </a>
            <a href='logout.php' class='action-btn'>
            <i class='fa fa-sign-out' aria-hidden='true'></i>
            </a>
            <a class='action-btn'>
            <ion-icon name='heart-outline'></ion-icon>
            <span class='count'>0</span>
            </a>
            <a href='cart.php' class='action-btn'>
            <ion-icon name='bag-handle-outline'></ion-icon>
            <span class='count'>0</span>
            </a> 
           
            ";
            
            } else{
              echo "<a href='login.php' class='action-btn'>
              <i class='fa fa-sign-in' aria-hidden='true'></i>
              </a>";
            }
            ?>
           

           
            
          </div>
        </div>
      </div>

      <nav class="desktop-navigation-menu">
        <div class="container">
          <ul class="desktop-menu-category-list">
            <li class="menu-category">
              <a href="index.php" class="menu-title">Home</a>
            </li>

            <li class="menu-category">
              <a href="#" class="menu-title">Categories</a>

              <div class="dropdown-panel">
                <ul class="dropdown-panel-list">
                  <li class="menu-title">
                    <a href="#">Electronics</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Desktop</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Laptop</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Camera</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Tablet</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Headphone</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">
                      <img
                        src="./assets/images/electronics-banner-1.jpg"
                        alt="headphone collection"
                        width="250"
                        height="119"
                      />
                    </a>
                  </li>
                </ul>

                <ul class="dropdown-panel-list">
                  <li class="menu-title">
                    <a href="#">Men's</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Formal</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Casual</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Sports</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Jacket</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Sunglasses</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">
                      <img
                        src="./assets/images/mens-banner.jpg"
                        alt="men's fashion"
                        width="250"
                        height="119"
                      />
                    </a>
                  </li>
                </ul>

                <ul class="dropdown-panel-list">
                  <li class="menu-title">
                    <a href="#">Women's</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Formal</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Casual</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Perfume</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Cosmetics</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Bags</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">
                      <img
                        src="./assets/images/womens-banner.jpg"
                        alt="women's fashion"
                        width="250"
                        height="119"
                      />
                    </a>
                  </li>
                </ul>

                <ul class="dropdown-panel-list">
                  <li class="menu-title">
                    <a href="#">Electronics</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Smart Watch</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Smart TV</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Keyboard</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Mouse</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">Microphone</a>
                  </li>

                  <li class="panel-list-item">
                    <a href="#">
                      <img
                        src="./assets/images/electronics-banner-2.jpg"
                        alt="mouse collection"
                        width="250"
                        height="119"
                      />
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="menu-category">
              <a href="#" class="menu-title">Men's</a>

              <ul class="dropdown-list">
                <li class="dropdown-item">
                  <a href="#">Shirt</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Shorts & Jeans</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Safety Shoes</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Wallet</a>
                </li>
              </ul>
            </li>

            <li class="menu-category">
              <a href="#" class="menu-title">Women's</a>

              <ul class="dropdown-list">
                <li class="dropdown-item">
                  <a href="allcategory.php?category=dress">Dress & Frock</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Earrings</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Necklace</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Makeup Kit</a>
                </li>
              </ul>
            </li>

            <li class="menu-category">
              <a href="#" class="menu-title">Jewelry</a>

              <ul class="dropdown-list">
                <li class="dropdown-item">
                  <a href="#">Earrings</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Couple Rings</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Necklace</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Bracelets</a>
                </li>
              </ul>
            </li>

            <li class="menu-category">
              <a href="#" class="menu-title">Perfume</a>

              <ul class="dropdown-list">
                <li class="dropdown-item">
                  <a href="#">Clothes Perfume</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Deodorant</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Flower Fragrance</a>
                </li>

                <li class="dropdown-item">
                  <a href="#">Air Freshener</a>
                </li>
              </ul>
            </li>

            <li class="menu-category">
              <a href="#" class="menu-title">Blog</a>
            </li>

            <li class="menu-category">
              <a href="#" class="menu-title">Hot Offers</a>
            </li>

            <?php
        if(isset($_SESSION["name"]))
        {
          echo "<li class='menu-category'>
          <a href='addproduct.php' class='menu-title'>Add Product</a>
          </li>
          <li class='menu-category'>
          <a href='showproduct.php' class='menu-title'>Show Product</a>
          </li>
          
          ";
        }
      
        ?>
        
          </ul>
        </div>
      </nav>

      <div class="mobile-bottom-navigation">
        <button class="action-btn" data-mobile-menu-open-btn>
          <ion-icon name="menu-outline"></ion-icon>
        </button>

        <?php
            if (isset($_SESSION['email']))
            {
              echo "<a href='profile.php' class='action-btn'>
              <ion-icon name='person-outline'></ion-icon>
            </a>
            <a href='logout.php' class='action-btn'>
            <i class='fa fa-sign-out' aria-hidden='true'></i>
            </a>
            <a class='action-btn'>
            <ion-icon name='heart-outline'></ion-icon>
            <span class='count'>0</span>
            </a>
            <a href='cart.php' class='action-btn'>
            <ion-icon name='bag-handle-outline'></ion-icon>
            <span class='count'>0</span>
            </a> 
           
            ";
            
            } else{
              echo "<a href='login.php' class='action-btn'>
              <i class='fa fa-sign-in' aria-hidden='true'></i>
              </a>";
            }
            ?>
      </div>

      <nav class="mobile-navigation-menu has-scrollbar" data-mobile-menu>
        <div class="menu-top">
          <h2 class="menu-title">Menu</h2>

          <button class="menu-close-btn" data-mobile-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>

        <ul class="mobile-menu-category-list">
          <li class="menu-category">
            <a href="#" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Men's</p>

              <div>
                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
              </div>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="#" class="submenu-title">Shirt</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Shorts & Jeans</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Safety Shoes</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Wallet</a>
              </li>
            </ul>
          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Women's</p>

              <div>
                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
              </div>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="allcategory.php?category=dress" class="submenu-title">Dress & Frock</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Earrings</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Necklace</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Makeup Kit</a>
              </li>
            </ul>
          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Jewelry</p>

              <div>
                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
              </div>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="#" class="submenu-title">Earrings</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Couple Rings</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Necklace</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Bracelets</a>
              </li>
            </ul>
          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Perfume</p>

              <div>
                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
              </div>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="#" class="submenu-title">Clothes Perfume</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Deodorant</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Flower Fragrance</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Air Freshener</a>
              </li>
            </ul>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Blog</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Hot Offers</a>
          </li>
        </ul>

        <div class="menu-bottom">
          <ul class="menu-category-list">
            <li class="menu-category">
              <button class="accordion-menu" data-accordion-btn>
                <p class="menu-title">Language</p>

                <ion-icon
                  name="caret-back-outline"
                  class="caret-back"
                ></ion-icon>
              </button>

              <ul class="submenu-category-list" data-accordion>
                <li class="submenu-category">
                  <a href="#" class="submenu-title">English</a>
                </li>

                <li class="submenu-category">
                  <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                </li>

                <li class="submenu-category">
                  <a href="#" class="submenu-title">Fren&ccedil;h</a>
                </li>
              </ul>
            </li>

            <li class="menu-category">
              <button class="accordion-menu" data-accordion-btn>
                <p class="menu-title">Currency</p>
                <ion-icon
                  name="caret-back-outline"
                  class="caret-back"
                ></ion-icon>
              </button>

              <ul class="submenu-category-list" data-accordion>
                <li class="submenu-category">
                  <a href="#" class="submenu-title">USD &dollar;</a>
                </li>

                <li class="submenu-category">
                  <a href="#" class="submenu-title">EUR &euro;</a>
                </li>
              </ul>
            </li>
          </ul>

          <ul class="menu-social-container">
            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!--
    - MAIN
  -->

    <main id="mymain">
      <!--
      - BANNER
    -->

      

    

      <div class="product-container">
        <div class="container">
          <!--
          - SIDEBAR
        -->

          <div class="sidebar has-scrollbar" data-mobile-menu>
            <div class="sidebar-category">
              <div class="sidebar-top">
              
                <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                  <ion-icon name="close-outline"></ion-icon>
                </button>
              </div>

              <ul class="sidebar-menu-category-list">
                <li class="sidebar-menu-category">
                  <button class="sidebar-accordion-menu" data-accordion-btn>
                   

                    <div>
                      <ion-icon name="add-outline" class="add-icon"></ion-icon>
                      <ion-icon
                        name="remove-outline"
                        class="remove-icon"
                      ></ion-icon>
                    </div>
                  </button>

                

            </div>

            
          </div>

          
        </div>
      </div>

      

    
        
          

           
    </main>

    <!--
    - FOOTER
  -->


    <!--
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>

    <!--
    - ionicon link
  -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>